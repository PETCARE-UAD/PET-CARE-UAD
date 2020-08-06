package com.example.petcareuad;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;

import com.example.petcareuad.Adapter.AdapterProfil;
import com.example.petcareuad.api.ApiRequestPetcare;
import com.example.petcareuad.api.Retroserver;
import com.example.petcareuad.model.DataProfil;
import com.example.petcareuad.model.ResponsModelProfil;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TmpProfilActivity extends AppCompatActivity {

    private RecyclerView mRecycler;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mManager;
    private List<DataProfil> mItems = new ArrayList<>();
    ProgressDialog pd;

    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tmp_profil);

        pd = new ProgressDialog(this);
        mRecycler = (RecyclerView) findViewById(R.id.tmpprofil);
        mManager = new LinearLayoutManager(this,LinearLayoutManager.VERTICAL, false);
        mRecycler.setLayoutManager(mManager);

        pd.setMessage("Loading ...");
        pd.setCancelable(false);
        pd.show();

        ApiRequestPetcare api = Retroserver.getClient().create(ApiRequestPetcare.class);
        Call<ResponsModelProfil> getdata = api.getdb_petcare();
        getdata.enqueue(new Callback<ResponsModelProfil>() {
            @Override
            public void onResponse(Call<ResponsModelProfil> call, Response<ResponsModelProfil> response) {
                pd.hide();
                Log.d("RETRO", "Response : " + response.body().getKode());
                mItems = response.body().getResult();

                mAdapter = new AdapterProfil(TmpProfilActivity.this,mItems);
                mRecycler.setAdapter(mAdapter);
                mAdapter.notifyDataSetChanged();
            }

            @Override
            public void onFailure(Call<ResponsModelProfil> call, Throwable t) {
                pd.hide();
                Log.d("RETRO", "FAILED : respon gagal");
            }
        });

    }
}