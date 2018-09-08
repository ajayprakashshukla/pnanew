         <!DOCTYPE html>
          <html>
          <head>
            <title></title>
          </head>
          <body>
               <div style="width: 700px;margin: 0px auto;border: 1px solid red;padding: 26px;">
                     <header style="text-align: center;">
                   <h3>PROGRESSIVE MOBIL EMPLOYEES MULTI-PURPOSE COOPERATIVE SOCIETY LTD</h3>
                   <img width="150px" src="<?php echo e(url('public/assets/pages/img/logo-big-white.png')); ?>">
                   </header>

                   <table width="100%">
                       <tr>
                        <td>Date: <span style="width: 300px;border-bottom: 1px solid #000;"><?php echo e(date('Y-m-d')); ?></span></td>
                       </tr>
                       <tr>
                        <td>The Manager Payroll,<br> Mobil Producing Nigeria Unltd.</td>
                       </tr>
                       <tr>
                        <td style="padding-top: 30px;">Sir,</td>
                       </tr>
                       <tr>
                        <td style="text-align: center;"><h3 style="text-decoration: underline;">AUTHORITY TO DEDUCT FROM MONTHLY SALARY</h3></td>
                       </tr>
                       <tr>
                        <td>I, <?php echo e($user->name); ?> <?php echo e($user->middle_name); ?> <?php echo e($user->lastname); ?>  -SHARP NO: <?php echo e($user->sharp_id); ?> have obtained a loan of <?php echo e(number_format($loan_application->amount_requested, 2, ',', ',')); ?> (NGN<?php echo e(number_format($loan_application->amount_requested, 2, ',', ',')); ?>), and I hereby authorize you to deduct from my monthly salary with effect from the month of <?php echo e(date('M',strtotime($repayment_plan->date))); ?> <?php echo e(date('Y',strtotime($repayment_plan->date))); ?> the amounts indicated in the attached payback plan and remit same to Progressive Mobil Employees Multi-purpose Cooperative Society Limited through an account as advised by the Society.</td>
                       </tr>
                       <tr>
                        <td>Under no circumstances should this deduction be stopped or reduced unless there is a letter from the above-named Society to that effect.</td>
                       </tr>
                       <tr>
                        <td>If I cease to be in the employment of the Company for whatever reason while still indebted to the society, such indebtedness shall be deducted upfront from my benefits including but not limited to my terminal benefits, retirement benefits, ESP, Superannuation, etc. as shall be advised by the Cooperative Society and remitted to the Society’s account.</td>
                       </tr>
                       <tr>
                        <td>
                          <table width="60%" style="padding-top: 25px;">
                            <tr>
                              <td width="34%">Applicant’s Signature:</td>
                              <td style="border-bottom: 1px solid #000;"></td>
                              <td width="10%">Date</td>
                              <td style="border-bottom: 1px solid #000;"></td>
                            </tr>
                          </table>
                          <p style="color: red;margin-top: 5px;">(By signing this form I confirm that information above is correct to the best of my knowledge and PROCOOP shall not be held responsible for any consequence arising from such incorrect information)</p>
                        </td>
                       </tr>
                       <tr>
                        <td>
                          <table width="60%">
                            <tr>
                              <td width="50%">Name of Witness to Declaration:</td>
                              <td style="border-bottom: 1px solid #000;"></td>
                            </tr>
                            <tr>
                              <td width="30%">Signature:</td>
                              <td style="border-bottom: 1px solid #000;"></td>
                            </tr>
                            <tr>
                              <td width="20%">Date:</td>
                              <td style="border-bottom: 1px solid #000;"></td>
                            </tr>
                          </table>
                        </td>
                       </tr>
                   </table>
               </div>
          </body>
          </html>