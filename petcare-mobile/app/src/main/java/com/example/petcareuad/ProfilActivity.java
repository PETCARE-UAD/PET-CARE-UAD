package com.example.petcareuad;

import androidx.annotation.NonNull;
import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.petcareuad.api.ApiRequestPetcare;
import com.example.petcareuad.api.Retroserver;
import com.example.petcareuad.model.ResponsModelProfil;
import com.rengwuxian.materialedittext.MaterialEditText;

import java.io.File;

import pl.aprilapps.easyphotopicker.EasyImage;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ProfilActivity extends AppCompatActivity {

    private ImageView setImage;
    MaterialEditText nama_pemilik, alamat, nohp, email;
    Button btninput, btnubah;
    ProgressDialog pd;

    public static final int REQUEST_CODE_CAMERA = 001;
    public static final int REQUEST_CODE_GALLERY = 002;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profil);

        setImage = (ImageView) findViewById(R.id.img);
        nama_pemilik = (MaterialEditText) findViewById(R.id.nama_pemilik);
        alamat = (MaterialEditText) findViewById(R.id.alamat);
        nohp = (MaterialEditText) findViewById(R.id.no_hp);
        email = (MaterialEditText) findViewById(R.id.email);
        btninput =(Button) findViewById(R.id.btninput);
        btnubah = (Button) findViewById(R.id.btnubah);

        Intent data = getIntent();
        final String iddata = data.getStringExtra("id");
        if(iddata != null) {
            btninput.setVisibility(View.GONE);
            btnubah.setVisibility(View.GONE);
            setImage.setImageURI(Uri.parse(data.getStringExtra("image")));
            nama_pemilik.setText(data.getStringExtra("nama_pemilik"));
            alamat.setText(data.getStringExtra("alamat"));
            nohp.setText(data.getStringExtra("nohp"));
            email.setText(data.getStringExtra("email"));
        }

        pd = new ProgressDialog(this);

        btninput.setOnClickListener(new View.OnClickListener() {
            @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
            @Override
            public void onClick(View v) {
                pd.setMessage("send data ... ");
                pd.setCancelable(false);
                pd.show();

                String simage = setImage.getTransitionName().toString();
                String snama_pemilik = nama_pemilik.getText().toString();
                String salamat = alamat.getText().toString();
                String snohp = nohp.getText().toString();
                String semail = email.getText().toString();
                ApiRequestPetcare api = Retroserver.getClient().create(ApiRequestPetcare.class);

                Call<ResponsModelProfil> sendprofil = api.sendtb_pemilikhewan(simage,snama_pemilik, salamat, snohp, semail);
                sendprofil.enqueue(new Callback<ResponsModelProfil>() {
                    @Override
                    public void onResponse(Call<ResponsModelProfil> call, Response<ResponsModelProfil> response) {
                        pd.hide();
                        Log.d("RETRO", "response : " + response.body().toString());
                        String kode = response.body().getKode();

                        if(kode.equals("1"))
                        {
                            Toast.makeText(ProfilActivity.this, "Data berhasil disimpan", Toast.LENGTH_SHORT).show();
                            Intent i = new Intent(ProfilActivity.this,ProfilActivity.class);
                            startActivity(i);
                        }else
                        {
                            Toast.makeText(ProfilActivity.this, "Data Error tidak berhasil disimpan", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<ResponsModelProfil> call, Throwable t) {
                        pd.hide();
                        Log.d("RETRO", "Falure : " + "Gagal Mengirim Request");
                    }
                });
            }
        });

        setImage = findViewById(R.id.img);
        setImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                setRequestImage();
            }
        });

        // add back button
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    }

    private void setRequestImage() {
        CharSequence[] item = {"Kamera", "Galeri"};
        AlertDialog.Builder request = new AlertDialog.Builder(this).setTitle("Add Image")
                .setItems(item, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        switch (i) {
                            case 0:
                                //Membuka Kamera Untuk Mengambil Gambar
                                EasyImage.openCamera(ProfilActivity.this, REQUEST_CODE_CAMERA);
                                break;
                            case 1:
                                //Membuaka Galeri Untuk Mengambil Gambar
                                EasyImage.openGallery(ProfilActivity.this, REQUEST_CODE_GALLERY);
                                break;
                        }
                    }
                });
        request.create();
        request.show();
    }

    //Method Ini Digunakan Untuk Menapatkan Hasil pada Activity, dari Proses Yang kita buat sebelumnya
    //Dan Mendapatkan Hasil File Photo dari Galeri atau Kamera
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        EasyImage.handleActivityResult(requestCode, resultCode, data, this, new EasyImage.Callbacks() {

            @Override
            public void onImagePickerError(Exception e, EasyImage.ImageSource source, int type) {
                //Method Ini Digunakan Untuk Menghandle Error pada Image
            }

            @Override
            public void onImagePicked(File imageFile, EasyImage.ImageSource source, int type) {
                //Method Ini Digunakan Untuk Menghandle Image
                switch (type){
                    case REQUEST_CODE_CAMERA:
                        Glide.with(ProfilActivity.this)
                                .load(imageFile)
                                .centerCrop()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(setImage);
                        break;

                    case REQUEST_CODE_GALLERY:
                        Glide.with(ProfilActivity.this)
                                .load(imageFile)
                                .centerCrop()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(setImage);
                        break;
                }
            }

            @Override
            public void onCanceled(EasyImage.ImageSource source, int type) {
                //Batalkan penanganan, Anda mungkin ingin menghapus foto yang diambil jika dibatalkan
            }
        });
    }

    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        int id = item.getItemId();

        if (id == android.R.id.home){
            this.finish();
        }

        return super.onOptionsItemSelected(item);
    }
}