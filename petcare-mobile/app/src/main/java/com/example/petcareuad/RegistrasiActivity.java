package com.example.petcareuad;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.rengwuxian.materialedittext.MaterialEditText;

import java.util.HashMap;
import java.util.Map;

public class RegistrasiActivity extends AppCompatActivity {

    MaterialEditText nama, alamat, nohp, email, password;
    Button registrasi;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registrasi);

        nama = findViewById(R.id.nama);
        email = findViewById(R.id.email);
        password = findViewById(R.id.password);
        registrasi = findViewById(R.id.register);
        registrasi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String txtnama = nama.getText().toString();
                String txtalamat = alamat.getText().toString();
                String txtnohp = nohp.getText().toString();
                String txtemail = email.getText().toString();
                String txtpassword = password.getText().toString();
                if (TextUtils.isEmpty(txtnama) || TextUtils.isEmpty(txtalamat) || TextUtils.isEmpty(txtnohp) || TextUtils.isEmpty(txtemail) || TextUtils.isEmpty(txtpassword))
                {
                    Toast.makeText(RegistrasiActivity.this, "All fields required", Toast.LENGTH_SHORT).show();
                }
                else
                {
                    registrasiAkunBaru(txtnama, txtalamat, txtnohp, txtemail, txtpassword);
                }
            }
        });

        // add back button
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    }

    private void registrasiAkunBaru(final String nama, final String alamat, final String nohp, final String email, final String password)
    {
        final ProgressDialog progressDialog = new ProgressDialog(RegistrasiActivity.this);
        progressDialog.setCancelable(false);
        progressDialog.setIndeterminate(false);
        progressDialog.setTitle("Registering New Account");
        progressDialog.show();
        String uRl = "http://192.168.43.152/Semester4/TPPetcareUAD/loginregister/register.php";
        StringRequest request = new StringRequest(Request.Method.POST, uRl, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if (response.equals("Registrasi Berhasil!")){
                    progressDialog.dismiss();
                    Toast.makeText(RegistrasiActivity.this, response, Toast.LENGTH_SHORT).show();
                    startActivity(new Intent(RegistrasiActivity.this, MainActivity.class));
                    finish();
                }
                else{
                    progressDialog.dismiss();
                    Toast.makeText(RegistrasiActivity.this, response, Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                progressDialog.dismiss();
                Toast.makeText(RegistrasiActivity.this, error.toString(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String, String> param = new HashMap<>();
                param.put("nama", nama);
                param.put("alamat", alamat);
                param.put("nohp", nohp);
                param.put("email", email);
                param.put("password", password);
                return param;
            }
        };
        request.setRetryPolicy(new DefaultRetryPolicy(30000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        MySingleton.getmInstance(RegistrasiActivity.this).addToRequestQueue(request);
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