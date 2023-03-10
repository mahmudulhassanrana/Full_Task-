jQuery(document).ready(function($){

        $("#AffiliateCreateEmail").on('keyup',function(){
            let AffiliateEmail = this.value;
            $.ajax({
                url:baseUrl+'/affiliateCheckEvent',
                type: "GET",
                data: {
                    email: AffiliateEmail
                },
                success: function(rs) {
                    if (rs.email == 'found') {
                        $("#AffiliateCreateEmail").css("background-color","#EF6F6F");
                        $("#SubmitAffiliate").attr("disabled", true);
                    } else {
                        $("#AffiliateCreateEmail").css("background-color","#9CE175");
                        $("#SubmitAffiliate").attr("disabled", false);
                    }
                }
            });
        });

        $("#AffiliatePromoCode").on('keyup',function(){
            let AffiliatePromoCode = this.value;
            $.ajax({
                url:baseUrl+'/affiliateCheckEvent',
                type: "GET",
                data: {
                    promo_code: AffiliatePromoCode
                },
                success: function(rs) {
                    if (rs.promo_code == 'found') {
                        $("#AffiliatePromoCode").css("background-color","#EF6F6F");
                        $("#SubmitAffiliate").attr("disabled", true);
                    } else {
                        $("#AffiliatePromoCode").css("background-color","#9CE175");
                        $("#SubmitAffiliate").attr("disabled", false);
                    }
                }
            });
        });

        $("#TransectionAmount").keypress(function(e) {
            validateNumeric(e);
        });

        function validateNumeric(evt) {
           var theEvent = evt || window.event;
           var key = theEvent.keyCode || theEvent.which;
           key = String.fromCharCode( key );
           var regex = /[0-9]|\./;
           if( !regex.test(key) ) {
              theEvent.returnValue = false;
              if(theEvent.preventDefault) theEvent.preventDefault();
           }
        }


    });



