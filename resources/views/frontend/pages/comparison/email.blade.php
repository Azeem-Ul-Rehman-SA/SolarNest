<!doctype html>
<html lang="en">

<head>


    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap" rel="stylesheet">
        <style>
            *:not(br):not(tr):not(html) {
                font-family: 'Exo';
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            .float-right {
                float: right;
            }

        </style>

        <style type="text/css">
            @font-face {
                font-family: Exo Text;
                src: url('https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap'); /* IE9 Compat
  Modes */
            url('https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap') format('woff'), /*
  Modern Browsers */
            url('https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap') format('truetype'),
            / Safari, Android, iOS /

            url('https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap') format('svg');
            / Legacy iOS /
            }

            p, h1, h2, h3, h4, span, ol, li, ul, b {
                font-family: 'Exo', sans-serif;
                font-weight: 400;
            }

        </style>

        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap');

            p, h1, h2, h3, h4, span, b ol, li, ul {
                font-family: 'Exo';
            }


        </style>
    </head>


</head>

<body>
<div class="email_temp_wrap">
    <div class="email_template">
        <div class="row align-center">

            @php
                $image_path = '/uploads/company_logos/'.$settings->logo.'';
                $partner_logo= '/uploads/user_profiles/'.$partner->profile_pic.'';
            @endphp
            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                <img class="solar-logo" src="{{ public_path() . $image_path }}">
                <div class="col-md-6 col-lg-6 col-xl-6 col-12 float-right">
                    <img class="installer-logo" src="{{ public_path() . $partner_logo }}">
                </div>
            </div>

        </div>
        <div class="date-box">
            <p class="date">Date : {{ date('d-m-Y',strtotime($order->created_at)) }}</p>
        </div>

        <div class="instalation_detail_box">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6 col-6 p-0">
                    <p class="title">Supply and Installation of <span
                            class="service">{{ $offer->system_wattage }} KW</span></p>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        <div class="customer_name">
            <h3>Dear Mr./Ms. <span>{{ $user->fullName() }},</span></h3>
        </div>
        <div class="email_cover">
            <p>We are very glad that you found the best suitable proposal for your house. Your solar system and energy
                independence is just a few steps away now.</p>
            <p>We at SolarNest with the help of <b>{{ $partner->company_name }}</b> are glad to present you the best
                commercial and technical
                proposal. The detailed proposal is attached in the other file attached in the email.</p>
            <p>Our team of <b>{{ $partner->company_name }}</b> will contact you for the site visit so they
                can accurately measure the dimensions and space on the roof. </p>
            <p>We want to make sure that your solar system is installed exactly as per your wishes in your house so
                please note that the final price might vary slightly, based on the location of the panels, size of the
                cable, and the size of the supporting structure. </p>
            <p>We are very excited to help you become energy independent, save your electricity bills and help Pakistan
                become a green, clean and environmentally sustainable country.</p>
        </div>

        <div class="solar-thanks">
            <p class="best-regards">Thanks,</p>
            <p>On behalf of SolarNest Team <span>{{$offer->city}}</span></p>
            <p>Team SolarNest.pk</p>
            @php
                $call = '/frontend/images/call.png';
            @endphp

            <p class="imgPadding"><img src="{{ public_path() . $call }}" class="imgHeight" width="17%" height="17%">&nbsp;{{ $settings->contact_number }}
            </p>
            @php
                $email = '/frontend/images/email.png';
            @endphp
            <p class="imgPadding"><img src="{{ public_path() . $email }}" class="imgHeight" width="17%" height="17%">&nbsp;{{$settings->email}}
            </p>
            @php
                $footer_path = '/uploads/company_logos/'.$settings->logo.'';
            @endphp
            <img class="faded_logo" src="{{ public_path() . $footer_path }}">
        </div>
    </div>
    <div class="email_temp_footer">
        <p class="proposal">Proposal Number : <span>{{ $order->proposal_number}}</span></p>
        <p>This proposal is valid for 30 days of issuance</p>
    </div>
</div>

<style>

    .best-regards {
        font-family: "Exo" !important;
    }

    span {
        font-family: "Exo" !important;
    }

    b {
        font-family: "Exo" !important;
    }

    p {
        font-family: "Exo" !important;
    }

    p b {
        font-family: "Exo" !important;
    }

    h3 {
        font-family: "Exo" !important;
    }

    h4 {
        font-family: "Exo" !important;
    }

    .customer_name {
        font-family: "Exo" !important;
    }

    * {
        font-family: "Exo" !important;
    }

    .imgPadding img {
        font-family: "Exo" !important;
        padding-right: 10px !important;
        margin-top: 5px !important;
    }

    .imgHeight {
        font-family: "Exo" !important;
        height: 20px;
        width: 20px;
    }

    .p-0 {
        font-family: "Exo" !important;
        padding: 0px;
    }

    .email_temp_wrap {
        font-family: "Exo" !important;
        padding: 50px;
        background: #fff;
    }

    .email_template .installer_hi {

        font-family: "Exo" !important;
        font-size: 14px;
        margin: 0px;
        position: absolute;
        top: -10px;
    }

    .date-box .date {
        font-family: "Exo" !important;
        color: #434343;
    }

    .instalation_detail_box {
        font-family: "Exo" !important;
        background: #F7F8FA;
        padding: 20px;
    }

    .instalation_detail_box .title {
        font-family: "Exo" !important;
        margin: 0px;
        color: #808080;
    }

    .instalation_detail_box .service {
        font-family: "Exo" !important;
        color: #003466;
        margin: 0px;
    }

    .customer_name {
        font-family: "Exo" !important;
        margin-top: 40px;
    }

    .customer_name h3 {
        font-family: "Exo" !important;
        color: #003466;
    }

    .customer_name span {
        font-family: "Exo" !important;
        color: #FFCC00;
    }

    .email_cover {
        font-family: "Exo" !important;
        font-weight: 500;
        background: #F7F8FA;
        color: #003466;
        padding: 50px;
        margin-bottom: 50px;
        margin-top: 20px;
    }

    .solar-thanks h4 {
        font-family: "Exo" !important;
        font-size: 30px;
    }

    .solar-thanks p {
        font-family: "Exo" !important;
        font-size: 15px;
    }

    .solar-thanks p i {
        margin-right: 10px;
    }

    .faded_logo {
        opacity: 0.5;
    }

    .email_temp_footer .proposal {
        font-family: "Exo" !important;
        color: #434343;
    }

    .email_temp_footer {
        font-family: "Exo" !important;
        margin-top: 100px;
        text-align: center;
    }

    .email_temp_footer p {
        color: #003466;
        margin-bottom: 5px;
        font-family: "Exo" !important;
    }

    .email_temp_footer span {
        color: #FFCC00;
        margin: 0px;
        font-family: "Exo" !important;
    }

    .installer-logo {
        height: 100px;
        width: 250px;
        object-fit: none;
    }

</style>

</body>
</html>
