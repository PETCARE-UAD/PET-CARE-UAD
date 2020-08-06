package com.example.petcareuad;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;

import com.rengwuxian.materialedittext.MaterialEditText;

public class PetcareActivity extends AppCompatActivity {

    CardView reservasi;
    CardView penitipan;
    CardView penitipandanreservasi;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_petcare);

        reservasi = findViewById(R.id.reservasi);
        penitipan = findViewById(R.id.penitipan);
        penitipandanreservasi = findViewById(R.id.pdp);

        reservasi.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(PetcareActivity.this, ReservasiActivity.class));
            }
        });
        penitipan.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(PetcareActivity.this, PenitipanActivity.class));
            }
        });
        penitipandanreservasi.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                startActivity(new Intent(PetcareActivity.this, Penitipan_PengobatanActivity.class));
            }
        });

        // add back button
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
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