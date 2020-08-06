package com.example.petcareuad;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MenuActivity extends AppCompatActivity {

    CardView profil;
    CardView data_hewan;
    CardView transaksi;
    CardView petcare;
    Button logout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        profil = findViewById(R.id.profil);
        data_hewan = findViewById(R.id.dh);
        transaksi = findViewById(R.id.transaksi);
        petcare = findViewById(R.id.petcare);
        logout = findViewById(R.id.logout);

        profil.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MenuActivity.this, ProfilActivity.class));
            }
        });
        data_hewan.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MenuActivity.this, DataHewanActivity.class));
            }
        });
        transaksi.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MenuActivity.this, TransaksiActivity.class));
            }
        });
        petcare.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MenuActivity.this, PetcareActivity.class));
            }
        });
        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MenuActivity.this, MainActivity.class));
            }
        });

    }
}