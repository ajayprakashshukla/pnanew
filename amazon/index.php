<?php
// Require the Composer autoloader.
require 'aws-autoloader.php';

use Aws\S3\S3Client;

$bucket='pnamachdb';
$file='waterfall.jpg';
$keyname = "file_10_07_2017.jpg";

// Instantiate an Amazon S3 client.
$client = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
	'credentials' => array(
    'key' => 'AKIAJQOCYMKAKZKGTI5Q',
    'secret'  => '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',
  )
]);

try{
$policy = base64_encode(json_encode(array(
    'expiration' => gmdate('Y-m-d\TH:i:s\Z', time() + 86400),
    'conditions' => array(
        array('acl' => 'public-read'),
        array('bucket' => $bucket),
        array('starts-with', '$key', ''),
        array('starts-with', '$Content-Type', '')
    )
)));

$signature = hash_hmac('sha1', $policy, 'AKIAJQOCYMKAKZKGTI5Q', true);
$signature = base64_encode($signature);

$result = $client->putObject(array(
    'Bucket' => $bucket,
    'Key'    => $keyname,
    'Body'   => $file,
    'ACL'    => 'private',
	'policy' =>  $policy,
	'signature' => $signature,
	'ContentType' => 'image/jpeg',
));
$data=$result->toArray();
//$object_url=$data['ObjectURL'];

//echo $object_url;

$cmd = $client->getCommand('GetObject', [
    'Bucket' => 'pnamachdb',
    'Key'    => 'file_10_07_2017.jpg'
]);

$request = $client->createPresignedRequest($cmd, '+20 minutes');
$presignedUrl = (string) $request->getUri();
echo $presignedUrl;

/*
$result = $client->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    // Each Bucket value will contain a Name and CreationDate
    //echo "<br/>{$bucket['Name']} - {$bucket['CreationDate']}\n";
	echo "<pre>";
	print_r($bucket);
 }
*/

	$response = $client->listObjects(array('Bucket' => $bucket, 'MaxKeys' => 1000));
	$files = $response->getPath('Contents');
	echo "<pre>";
	print_r($files); exit;

}
catch (Aws\S3\Exception\S3Exception $e) {
    //echo "There was an error uploading the file.\n";
	echo $e->getMessage();
}
?>