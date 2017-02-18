<?php

if( isset( $_POST['order-id'] ) ) {

	$customername	 = $_POST['customer-name'];
	$customeremail	 = $_POST['customer-email'];
	$customeraddress = $_POST['customer-address'];
	$customerphone	 = $_POST['customer-phone'] ? $_POST['customer-phone'] : '';
	$storename 		 = $_POST['store-name'];
	$storephone		 = $_POST['store-phone'];
	$storeemail		 = $_POST['store-email'];
	$storeaddress	 = $_POST['store-address'];
	$bankaccount1	 = $_POST['bank-info-1'] ? $_POST['bank-info-1'] : '';
	$bankaccount2	 = $_POST['bank-info-2'] ? $_POST['bank-info-2'] : '';
	$bankaccount3	 = $_POST['bank-info-3'] ? $_POST['bank-info-3'] : '';
	$bankaccount4	 = $_POST['bank-info-4'] ? $_POST['bank-info-4'] : '';
	$invoice 		 = $_POST['order-id'];
	$itemLength 	 = (int)$_POST['item_length'];
	$cartTotal		 = $_POST['cart_total'];
	$itemlist		 = '';
	$bankaccount	 = '';
	for( $i=0; $i<$itemLength; $i++ ) 
	{
		$j = $i + 1;
		$itemlist	.= '<tr>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$_POST["item_name_".$j].'</td>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: center;">'.$_POST["item_qty_".$j].'</td>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$_POST["item_price_".$j].'</td>';
		$itemlist	.= '<td style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$_POST["item_total_".$j].'</td>';
		$itemlist	.= '</tr>';	                                                      
	}
	
	if( $bankaccount1 != '' ) $bankaccount .= '<p>'.$bankaccount1.'</p>';
	if( $bankaccount2 != '' ) $bankaccount .= '<p>'.$bankaccount2.'</p>';
	if( $bankaccount3 != '' ) $bankaccount .= '<p>'.$bankaccount3.'</p>';
	if( $bankaccount4 != '' ) $bankaccount .= '<p>'.$bankaccount4.'</p>';
	
	// message
	$message  = '<html>';
	$message .= '<head>';
	$message .= '<title></title>';
	$message .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$message .= '</head>';
	$message .= '<body style="background-color: #f1f1f5; color: #666666; font-weight: normal; line-height: 18px; font-style: normal; font-size: 12px; font-family: Arial, Helvetica, sans-serif;">';
	$message .= '<div align="center">';
	$message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
	$message .= '<tr>
					<td style="padding-bottom: 0px; padding-top: 10px;">&nbsp;</td>
	  			 </tr>';
	$message .= '
	  <tr>
		<td align="center"><table width="50%" border="0" cellspacing="0" cellpadding="0" style="background: #FFF; border: 1px solid #d4d4d4; border-radius: 10px">
		  <tr>
			<td width="50%" style="border-bottom-color: #d4d4d4; border-bottom-style: solid; border-bottom-width: 3px; padding: 20px; font-weight: bold; font-size: 18px; color: #333333;">'.$storename.'</td>
			<td style="padding: 20px; border-bottom-color: #d4d4d4; border-bottom-style: solid; border-bottom-width: 3px; text-align: right; color: #d87e7e; font-size: 14px; font-weight: bold;">Invoice No: '.$invoice.'</td>
		  </tr>
		  <tr>
			<td colspan="2" style="line-height: 18px; padding: 20px; font-size: 12px; color: #666666;"><p>Hallo '.$customername.',</p>
			  <p>Terima kasih telah melakukan order di '.$storename.'. Email ini merupakan informasi tagihan terkait dengan order anda di toko kami. Berikut detail order anda :</p>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top: 1px solid #f0e1ba; border-left: 1px solid #f0e1ba">
				<tr>
				  <td width="34%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">Nama Item</td>
				  <td width="11%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: center;">Qty</td>
				  <td width="26%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">Harga</td>
				  <td width="29%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">Sub Total</td>
				</tr>
				'.$itemlist.'
				<tr>
				  <td colspan="3" style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: right;">Total</td>
				  <td style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$cartTotal.'</td>
				</tr>
			  </table>
			  <p>Selanjutnya, silahkan lakukan pembayaran sejumlah total order anda yaitu <span style="font-weight: bold">'.$cartTotal.'</span> + biaya pengiriman ( Biaya pengiriman akan kami informasikan sesaat setelah anda menerima email ini ) ke salah satu rekening kami berikut ini :</p>
			  '.$bankaccount.'
			  <p>Setelah melakukan pembayaran, segera konfirmasikan kepada kami dengan cara menghubungi kami dengan membalas email ini atau melalui sms ke '.$storephone.' dengan format sebagai berikut :</p>
			  <p style="font-weight: bold; color: #333333;">KONFIRMASI PEMBAYARAN # NO INVOICE # KE REKENING # DARI REKENING + ATAS NAMA</p>
			  <p>Setelah pembayaran kami terima, kami akan segera melakukan pengiriman barang yang anda order dan kami akan menginformasikan kepada anda no resi pengiriman barang melalui sms.</p>
			  <p>Terima kasih,</p>
			  <p>'.$storename.'<br>'.$storeaddress.'<br>'.$storephone.'<br>'.$storeemail.'</p>
			  </td>
			</tr>
		</table></td>
	  </tr>
	  <tr>
		<td style="padding-bottom: 10px;">&nbsp;</td>
	  </tr>
	</table>
	</div>
	</body>
	</html>
	';
	
	$to  = $customername.' <'.$customeremail.'>';
	$subject = $storename.' - Informasi Order No. '.$invoice;
	$headers  = 'From: '.$storename.' <'.$storeemail.'>' . "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/////////////////////////////////////////////////////////////////////////////////////

	$to1 = $storeemail;
	$subject1  = $storename.' - New Order '.$invoice;
	$message1  = '<p>Ada order baru di '.$storename.'</p>';
	$message1 .= '<p>No Invoice: '.$invoice.'</p>';
	$message1 .= '<p>Nama Customer: '.$customername.'</p>';
	$message1 .= '<p>Email Customer: '.$customeremail.'</p>';
	$message1 .= '<p>Alamat Customer: '.$customeraddress.'</p>';
	$message1 .= '<p>No HP Customer: '.$customerphone.'</p>';
	$message1 .= '<p>Data order sebagai berikut:</p>';
	$message1 .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top: 1px solid #f0e1ba; border-left: 1px solid #f0e1ba">
				<tr>
				  <td width="34%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">Nama Item</td>
				  <td width="11%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: center;">Qty</td>
				  <td width="26%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">Harga</td>
				  <td width="29%" style="background-color: #fff3dd; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">Sub Total</td>
				</tr>
				'.$itemlist.'
				<tr>
				  <td colspan="3" style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: right;">Total</td>
				  <td style="background-color: #ffffff; border-right: 1px solid #f0e1ba; border-bottom: 1px solid #f0e1ba; padding: 5px; color: #333333; font-weight: bold; font-size: 12px; text-align: left;">'.$cartTotal.'</td>
				</tr>
			  </table>';
	$headers1  = 'From: '.$customername.' <'.$customeremail.'>' . "\r\n";
	$headers1 .= 'MIME-Version: 1.0' . "\r\n";
	$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$sendtocustomer = mail($to, $subject, $message, $headers);
	$sendtoowner = mail($to1, $subject1, $message1, $headers1);
	
	if( $sendtocustomer ) {
	  if ( $sendtoowner ) {
	    header('Location: '.$_POST['thankyoupage']);
	  }
	}
	
} else {
	echo 'Duarrrrrrrrrrrrrrrrrrrr';
}

?>
