
// for printing invoice

function printOrders(orderId, orderNumber, orderType, createdDate, orderStatus, order_user_discount_id){
    $.ajax({
        url: '/orders/get-info-to-print',
        type: 'get',
        data: { id: orderId },
        success: function(data) {
            // console.log(data);
            var html = '<div style="background-color: white; color: black; padding: 5px;">';
                html +='<p style="margin-bottom: 5px; font-size: 20px; font-weight: bold; text-align: center;">Order#'+orderNumber+'</p>';
            for (let a = 0; a < data.getOrderTypeDetails.length; ++a) {
                html +='<table style="border-bottom: 1px solid gray; margin-bottom: 10px;">';
                html +='    <tbody>';
                html +='        <tr>';
                html +='            <td style="width: 200px;">Order#'+orderNumber+'</td>';
                html +='            <td style="width: 150px;">'+orderType+'</td>';
                html +='            <td style="width: 150px;">'+orderStatus+'</td>';
                html +='            <td style="width: 250px;">'+createdDate+'</td>';
                html +='        </tr>';
                html +='    </tbody>';
                html +='</table>';
                
                if(data.getOrderTypeDetails[a]['order_type'] == 3){
                    for (let f = 0; f < data.userLists.length; ++f) {
                        if(data.getOrderTypeDetails[a]['user_id'] === data.userLists[f]['id']){
                            var full_address = '';
                                full_address += data.userLists[f]['addtl_address']+', ';
                                for (let ci = 0; ci < data.cities.length; ++ci) {
                                    if(Number(data.cities[ci]['city_code']) == data.userLists[f]['city_id']){
                                        var cit = data.cities[ci]['city_name'].toLowerCase();
                                        var city = cit.charAt(0).toUpperCase() + cit.slice(1);
                                        full_address += city + ', ';
                                    }
                                }
                                for (let pr = 0; pr < data.provinces.length; ++pr) {
                                    if(Number(data.provinces[pr]['province_code']) == data.userLists[f]['province_id']){
                                        var prov = data.provinces[pr]['province_name'].toLowerCase();
                                        var province = prov.charAt(0).toUpperCase() + prov.slice(1);
                                        full_address += province + ', ';
                                    }
                                }
                                for (let re = 0; re < data.regions.length; ++re) {
                                    if(Number(data.regions[re]['region_code']) == data.userLists[f]['region_id']){
                                        var reg = data.regions[re]['region_name'].toLowerCase();
                                        var region = reg.charAt(0).toUpperCase() + reg.slice(1);
                                        full_address += region;
                                    }
                                }
                            html +='<table style="border-bottom: 1px solid gray; margin-bottom: 10px;">';
                            html +='    <tbody>';
                            html +='        <tr>';
                            html +='            <td style="width: 450px;">'+full_address+'</td>';
                            html +='            <td style="width: 150px;">'+data.userLists[f]['email_address']+'</td>';
                            html +='            <td style="width: 150px;">'+data.userLists[f]['contact_number']+'</td>';
                            html +='        </tr>';
                            html +='    </tbody>';
                            html +='</table>';
                        }
                    }
                }

                for (let b = 0; b < data.getCarts.length; ++b) {
                    html +='<table>';
                    html +='    <tbody>';
                    if(data.getCarts[b]['order_id'] === data.getOrderTypeDetails[a]['id'] && data.getCarts[b]['orders_id'] === data.getOrderTypeDetails[a]['id']){
                        html +='    <tr>';
                        html +='        <td style="width: 200px;">'+data.getCarts[b]['menu']+'</td>';
                        html +='        <td style="width: 150px;">x'+data.getCarts[b]['quantity']+'</td>';
                        var price = Number(data.getCarts[b]['price']);
                        html +='        <td style="width: 150px;">₱ '+price+'</td>';
                        var subTotal = Number(data.getCarts[b]['subTotal']);
                        html +='        <td style="width: 250px;">₱ '+subTotal+'</td>';
                        html +='    </tr>';
                    }
                    html +='    </tbody>';
                    html +='</table>';
                }
                
                for (let c = 0; c < data.getCartTotalPrice.length; ++c) {
                    html +='<table style="border-top: 1px solid gray; margin-top: 3px;">';
                    html +='    <tbody>';
                    if(data.getCartTotalPrice[c]['order_id'] === data.getOrderTypeDetails[a]['id']){
                        html +='    <tr style="margin-top: 2px;">';
                        for (let d = 0; d < data.getPaymentMethod.length; ++d) {
                            if(data.getPaymentMethod[d]['id'] === data.getOrderTypeDetails[a]['payment_method_id']){
                                const payment_method = data.getPaymentMethod[d]['payment_method'].charAt(0).toUpperCase() + data.getPaymentMethod[d]['payment_method'].slice(1);
                                html +='        <td style="width: 250px;">Payment Method: '+payment_method+'</td>';
                            }
                        }
                        html +='        <td style="width: 250px;">Coupon Discount: '+(data.getOrderTypeDetails[a]['coupon_discount'] == null ? data.getOrderTypeDetails[a]['coupon_code']+'- ₱'+data.getOrderTypeDetails[a]['coupon_discount'] : '- ₱0')+'</td>';
                            if(orderType == 3){
                                html +='        <td style="width: 250px;">Delivery fee: + ₱'+data.getCartTotalPrice[c]['delivery_fee']+'</td>';
                            }
                        html +='    </tr>';

                        html +='    <tr style="margin-top: 2px;">';
                        var total_amount = Number(data.getCartTotalPrice[c]['total_amount']);
                        html +='        <td style="width: 250px;">Amount:&nbsp;₱'+total_amount.toFixed(2)+'</td>';
                        var total_amount_vat = Number(data.getCartTotalPrice[c]['total_amount_vat']);
                        html +='        <td style="width: 250px;">Less ('+data.getVAT['description']+') VAT: - ₱'+total_amount_vat.toFixed(2)+'</td>';
                        var discount_amount = Number(data.getCartTotalPrice[c]['discount_amount']);
                        html +='        <td style="width: 250px;">Discount: - ₱'+(discount_amount != 0 ? discount_amount.toFixed(2) : '0')+'</td>';
                        html +='    </tr>';

                        html +='    <tr style="margin-top: 2px;">';
                        var c_cash = Number(data.getCartTotalPrice[c]['c_cash']);
                        html +='        <td style="width: 250px;">Cash: ₱'+c_cash.toFixed(2)+'</td>';
                        var c_balance = Number(data.getCartTotalPrice[c]['c_balance']);
                        html +='        <td style="width: 250px;">Change: ₱'+c_balance.toFixed(2)+'</td>';
                        if(order_user_discount_id == 0){
                            var total_amount_bill_no_discount = Number(data.getCartTotalPrice[c]['total_amount_bill_no_discount']);
                            html +='    <td style="width: 250px;">Total bill: ₱'+total_amount_bill_no_discount.toFixed(2)+'</td>';
                        }else{
                            var total_amount_bill = Number(data.getCartTotalPrice[c]['total_amount_bill']);
                            html +='    <td style="width: 250px;">Total bill: ₱'+total_amount_bill.toFixed(2)+'</td>';
                        }
                        html +='    </tr>';
                    }
                    html +='    </tbody>';
                    html +='</table>';
                }
            }
            html +='</div>';

            var originalContents = document.body.innerHTML;
        
            document.body.innerHTML = html;
        
            window.print();
        
            document.body.innerHTML = originalContents;
        },
    });

}