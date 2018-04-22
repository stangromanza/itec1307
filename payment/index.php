<html>
    <head>
    </head>
    <body>
        <form name="checkoutForm" method="POST" action="payment.php">
            <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                    data-key="pkey_test_59h5zegwaso33nhfm7m"
                    data-image="http://bit.ly/customer_image"
                    data-frame-label="Merchant site name"
                    data-button-label="Pay now"
                    data-submit-label="Submit"
                    data-location="no"
                    data-amount="10025"
                    data-currency="thb"
                    >
            </script>
            <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
        </form>

        <!-- data-key="YOUR_PUBLIC_KEY" -->
    </body>
</html>