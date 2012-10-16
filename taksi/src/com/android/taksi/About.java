package com.android.taksi;

import android.app.Activity;
import android.os.Bundle;
import android.webkit.WebView;

public class About extends Activity{
	private WebView webView;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.about);
		webView = (WebView)findViewById(R.id.webview);
		String html = "<html>" +
				"<title>" +
				"M-Taksi" +
				"<title>" +
				"<body>" +
				"<b>" +
				"Petunjuk Penggunaan aplikasi pemesanan taksi:" +
				"</b>" +
				"<br>" +
				"1. Pilih Menu Pesan, Masukkan data pemesanan sesuai identitas Anda!" +
				"<br>" +
				"2. Pastikan data yang anda masukkan benar dan dapat dipertanggungjawabkan!" +
				"<br>" +
				"3. Setelah Memasukkan data pemesanan, pilih Menu Cek Konfirmasi untuk melihat konfirmasi pemesanan!" +
				"<br>" +
				"4. Pembatalan hanya dapat dilakukan apabila status dalam keadaan BELUM dikonfirmasi oleh operator kami!" +
				"<br>" +
				"5. Pembatalan yang anda lakukan dan konfirmasi dari operator perusahaan taksi kami berlaku 1 x 24 jam!" +
				"</body>" +
				"</html>";
		String mime = "text/html";
		String encoding = "utf-8";
        webView.getSettings().setJavaScriptEnabled(true);
        webView.loadDataWithBaseURL(null, html, mime, encoding, null);
	}

}
