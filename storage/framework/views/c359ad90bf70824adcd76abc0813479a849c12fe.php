<?php
use App\Models\Shop;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>CarWash</title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media  screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media  screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }
    </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#fff;">
    <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#fff;">
        <table role="presentation" style="width:100%;border:1px rgb(141, 137, 137) solid;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">

                    <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <?php
                                    if($details->status==0){
                                            $status_display='Waiting';
                                        }
                                    if($details->status==1){
                                            $status_display='Vehicle Received';
                                        }
                                    if($details->status==2){
                                            $status_display='Processing';
                                        }
                                    if($details->status==3){
                                            $status_display='Finished';
                                        }
                                ?>
                                <h1 style="margin-top:0;margin-bottom:16px;font-size:16px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Dear <?php echo e($details->customer_name); ?>,</h1>
                                <h5 style="margin-top:0;margin-bottom:16px;font-size:18px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Your vehicle number <?php echo e($details->vehicle_number); ?> details are given below.</h5>
                                <h5 style="margin-top:0;margin-bottom:16px;font-size:18px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Service Status : <?php echo e($status_display); ?> </h5>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                                <div class="col-sml" style="display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;">
                                    <img src="" width="115" alt="" style="width:115px;max-width:80%;margin-bottom:20px;">
                                </div>
                                <div class="col-lge" style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Vehicle Number: <?php echo e($details->vehicle_number); ?></p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Date: <?php echo e($details->date); ?></p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Time: <?php echo e($details->time); ?></p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Status: <?php echo e($status_display); ?></p>
                                </div>

                                <div class="col-lge" style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">QR code</p>
                                    <?php echo QrCode::size(300)->generate(route('servicerecord.show',encrypt($details->id))); ?>

                                </div>


                            </td>
                        </tr>
                        <tr>
                            <td style="padding:20px;background-color:#ffffff;">
                                <p style="margin-top:0;margin-bottom:18px;color:#969aa0;">Thanks,</p>
                                <p style="margin-top:0;margin-bottom:18px;color:#969aa0;">
                                    <?php
                                        $data =Shop::where('id',$details->shop_id)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/emails/redcontact.blade.php ENDPATH**/ ?>