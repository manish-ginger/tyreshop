<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Alpha Labs</title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 530px) {
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

        @media screen and (min-width: 531px) {
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
                                <h1 style="margin-top:0;margin-bottom:16px;font-size:16px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Greetings Administrator,</h1>
                                <h5 style="margin-top:0;margin-bottom:16px;font-size:18px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">You have a customer {{ ucfirst($details->title) }}. Details given below.</h5>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                                <div class="col-sml" style="display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;">
                                    <img src="https://redlimousine.qa/images/logo2.png" width="115" alt="" style="width:115px;max-width:80%;margin-bottom:20px;">
                                </div>
                                <div class="col-lge" style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                                    @php
                                    if($details->title == 'contact')
                                    { 
                                    @endphp
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Name: {{ $details->name }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Email: {{ $details->email }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Phone: {{ $details->phone }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Company: {{ $details->company }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Location: {{ $details->home }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Message: {{ $details->message }}</p>
                                    @php
                                    }
                                    if($details->title == 'quick-contact' || $details->title == 'appointment' || $details->title == 'home-collection' )
                                    {
                                    @endphp
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Name: {{ $details->name }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Email: {{ $details->email }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Phone: {{ $details->phone }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">QatarID: {{ $details->Q_id }}</p>
                                    <p style="margin-top:0;margin-bottom:18px;color:#2f3640;">Date: {{ $details->date }}</p>
                                    @php
                                    }
                                    @endphp
                                    
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td style="padding:20px;background-color:#ffffff;">
                                <p style="margin-top:0;margin-bottom:18px;color:#969aa0;">Thanks,</p>
                                <p style="margin-top:0;margin-bottom:18px;color:#969aa0;">AlphaLabsQatar</p>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
</body>
</html>