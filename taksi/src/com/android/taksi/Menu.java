package com.android.taksi;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;

import android.widget.Button;

public class Menu extends Activity{
	private Button pesan,info,tentang;
	private  Intent intent = null;
	private String uid;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.menu);
		pesan =(Button)findViewById(R.id.pesan);
		info = (Button)findViewById(R.id.info);
		tentang = (Button)findViewById(R.id.tentang);
		uid = android.provider.Settings.Secure.getString(getContentResolver(), android.provider.Settings.Secure.ANDROID_ID);
		pesan.setOnClickListener(new OnClickListener() {
			
			public void onClick(View v) {
				// TODO Auto-generated method stub
				intent =new Intent(Menu.this, Taksi.class);
				startActivity(intent);
			}
		});
		info.setOnClickListener(new OnClickListener() {
			
			public void onClick(View v) {
				// TODO Auto-generated method stub
				 String server_addr = "@string/server_addr";
				 intent = new Intent(Intent.ACTION_VIEW, Uri.parse("http://10.0.2.2/taksi/index.php/home/index/"+uid));
						
				 startActivity(intent);

			}
		});
		tentang.setOnClickListener(new OnClickListener() {
			
			public void onClick(View v) {
				// TODO Auto-generated method stub
			intent = new Intent(Menu.this, About.class);
			startActivity(intent);
			}
		});}
		
		public void onBackPressed() {
		    AlertDialog.Builder builder = new AlertDialog.Builder(this);
		    builder.setMessage("Apakah anda yakin keluar dari aplikasi?")
		           .setCancelable(false)
		           .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
		               public void onClick(DialogInterface dialog, int id) {
		                    Menu.this.finish();
		               }
		           })
		           .setNegativeButton("Tidak", new DialogInterface.OnClickListener() {
		               public void onClick(DialogInterface dialog, int id) {
		                    dialog.cancel();
		               }
		           });
		    AlertDialog alert = builder.create();
		    alert.show();


	}
	
	

}
