<style>
    .cookie-bar {
        position: fixed;
        bottom: 0px;
        padding: 10px 15px;
        width: 100%;
        display: none;
        z-index: 15;
        background-color: black;
        font-family: "Poppins", sans-serif;
    }

    .cookie-para {
        color: white;
        font-size: 12px;
        font-weight: normal;
        display: inline-block;
        padding-bottom: 5px;
    }

    .cookie-space {
        padding-bottom: 45px;
    }

    .cookie-btn {
        font-size: 14px;
        color: #ffffff;
        background: red;
        padding: 2px 15px;
        border-radius: 4px;
        display: inline-block;
        margin-left: 1%;
    }

    .cookie-btn.secondary {
        color: #ffffff;
        background: #3575ff;
    }

    @media (max-width: 767px) {
        .cookie-bar {
            padding: 10px 15px 40px 15px;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


<section class="cookie-bar">
    <div class="cookie-notice container">
        <p class="cookie-para"> We take Charge For Our Services Which Is confirmed By Our Management Team Or Informed When You Decided To Buy / Rent / Sell </p>
        <a href="javascript:;" class="cookie-btn">Ok</a>
        <a href="privacy-policy.php" class="cookie-btn secondary">Read More</a>

    </div>
</section>

<script>
    $(document).ready(function() {
        if (readCookie("cookie_accepted") == "1") {
            $(".cookie-bar").hide();
        } else {
            $(".cookie-bar").show();
            $('body').addClass('cookie-space');
            $('.cookie-btn').click(function() {
                $('body').removeClass('cookie-space');
                $('.cookie-bar').fadeOut();
                createCookie("cookie_accepted", 1, 365);
            });
        }
    });



    function getParameterByName(name, url) {
        if (!url) {
            url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function createCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }

    $(document).ready(function() {
        var advMedium = getParameterByName('advm');
        if (advMedium != null) {
            $('input[name=advm]').val(advMedium);
            createCookie('advm', advMedium, 1);
        } else {
            advMedium = readCookie('advm');
            $('input[name=advm]').val(advMedium);
        }
        var nodeCount = document.getElementsByName('ft').length;
        for (count = 0; count < nodeCount; count++) {
            document.getElementsByName('ft')[count].value = window.location.href;
        }
    });
</script>