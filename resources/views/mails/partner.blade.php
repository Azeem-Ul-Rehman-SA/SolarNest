<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap" rel="stylesheet">

    <style type="text/css" rel="stylesheet" media="all">


        /* Base ------------------------------ */
        *:not(br):not(tr):not(html) {
            font-family: 'Exo';
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            width: 100% !important;
            height: 100%;
            margin: 0;
            line-height: 1.4;
            background-color: #F5F7F9;
            color: #839197;
            -webkit-text-size-adjust: none;
        }

        a {
            color: #414EF9;
        }

        /* Layout ------------------------------ */
        .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: #F5F7F9;
        }

        .email-content {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        /* Masthead ----------------------- */
        .email-masthead {
            padding: 25px 0;
            text-align: center;
        }

        .email-masthead_logo {
            max-width: 400px;
            border: 0;
        }

        .email-masthead_name {
            font-size: 16px;
            font-weight: bold;
            color: #839197;
            text-decoration: none;
            text-shadow: 0 1px 0 white;
        }

        /* Body ------------------------------ */
        .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
            border-top: 1px solid #E7EAEC;
            border-bottom: 1px solid #E7EAEC;
            background-color: #FFFFFF;
        }

        .email-body_inner {
            width: 570px;
            margin: 0 auto;
            padding: 0;
        }

        .email-footer {
            width: 570px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
        }

        .email-footer p {
            color: #839197;
        }

        .body-action {
            width: 100%;
            margin: 30px auto;
            padding: 0;
            text-align: center;
        }

        .body-sub {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #E7EAEC;
        }

        .content-cell {
            padding: 35px;
        }

        .align-right {
            text-align: right;
        }

        /* Type ------------------------------ */
        h1 {
            margin-top: 0;
            color: #292E31;
            font-size: 19px;
            font-weight: bold;
            text-align: left;
        }

        h2 {
            margin-top: 0;
            color: #292E31;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
        }

        h3 {
            margin-top: 0;
            color: #292E31;
            font-size: 14px;
            font-weight: bold;
            text-align: left;
        }

        p {
            margin-top: 0;
            color: #839197;
            font-size: 16px;
            line-height: 1.5em;
            text-align: left;
        }

        p.sub {
            font-size: 12px;
        }

        p.center {
            text-align: center;
        }

        /* Buttons ------------------------------ */
        .button {
            display: inline-block;
            width: 200px;
            background-color: #414EF9;
            border-radius: 3px;
            color: #ffffff;
            font-size: 15px;
            line-height: 45px;
            text-align: center;
            text-decoration: none;
            -webkit-text-size-adjust: none;
            mso-hide: all;
        }

        .button--green {
            background-color: #28DB67;
        }

        .button--red {
            background-color: #FF3665;
        }

        .button--blue {
            background-color: #414EF9;
        }

        /*Media Queries ------------------------------ */
        @media only screen and (max-width: 600px) {
            .email-body_inner,
            .email-footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        h2 {
            margin-top: 12px;
        }

        a.button {
            cursor: pointer;
            cursor: hand;
        }

        .verify-btn {
            font-family: 'Exo';
            font-size: 15px;
            box-sizing: border-box;
            border-radius: 3px;
            color: #fff !important;
            display: inline-block;
            text-decoration: none;
            background-color: #003466;
            border-top: 10px solid #003466;
            border-right: 18px solid #003466;
            border-bottom: 10px solid #003466;
            border-left: 18px solid #003466;
        }


        *:not(br):not(tr):not(html) {
            font-family: 'Exo';
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #003466 !important;
        }
        body, td, input, textarea, select {
            color: #003466 !important;
            margin: 0;
            font-family: Exo Text;
        }

        body, td, input, textarea, select, #loading {
            font-family: Exo Text !important;
        }
    </style>
</head>
<body>
<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td class="email-masthead content-cell" style="background: #003466;color:white;">
                        <img src="{{ asset('/uploads/footer_logos/'.$settings->footer_logo) }}"
                             style="width: 30% !important; height: auto; !important;" alt="logo">
                        <span class="logodesc">
              </span>
                    </td>
                </tr>
                <!-- Email Body -->
                <tr>
                    <td class="email-body" width="100%">
                        <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    <!-- Action -->
                                    <table class="body-action" align="center" width="100%" cellpadding="0"
                                           cellspacing="0">
                                        <tr>
                                            <td valign="top" align="left">
                                                <table class="p100"
                                                       style="margin: 0; mso-table-lspace: 0; mso-table-rspace: 0; padding: 0;"
                                                       cellspacing="0" cellpadding="0" border="0" align="left">
                                                    <tbody>
                                                    <tr>
                                                        <td valign="top" align="left">
                                                            <table class="p100"
                                                                   style="margin: 0; mso-table-lspace: 0; mso-table-rspace: 0; padding: 0; width: 600px;"
                                                                   width="600" cellspacing="0" cellpadding="0"
                                                                   border="0" align="left">
                                                                {!! $emailTemplate['content'] !!}
                                                            </table>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="background: #003466;color:white;">
                        <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-cell">
                                    <p class="sub center" style="color:#fff">
                                        Support Team
                                        <br>
                                        <b>SolarNest.pk</b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
