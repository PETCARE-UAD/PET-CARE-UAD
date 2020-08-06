package com.example.petcareuad.Adapter;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.petcareuad.R;
import com.example.petcareuad.TmpProfilActivity;
import com.example.petcareuad.model.DataProfil;

import java.text.BreakIterator;
import java.util.List;

public class AdapterProfil extends RecyclerView.Adapter<AdapterProfil.HolderData> {

    private List<DataProfil> mList ;
    private Context ctx;


    public  AdapterProfil (Context ctx, List<DataProfil> mList)
    {
        this.ctx = ctx;
        this.mList = mList;
    }

    @Override
    public HolderData onCreateViewHolder(ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(parent.getContext()).inflate(R.layout.layoutlist,parent, false);
        HolderData holder = new HolderData(layout);
        return holder;
    }

    @Override
    public void onBindViewHolder(HolderData holder, int position) {
        DataProfil dm = mList.get(position);
        holder.image.setText(dm.getImage());
        holder.nama_pemilik.setText(dm.getNama_pemilik());
        holder.alamat.setText(dm.getAlamat());
        holder.nohp.setText(dm.getNohp());
        holder.email.setText(dm.getEmail());
        holder.dm = dm;
    }

    @Override
    public int getItemCount() {
        return mList.size();
    }


    class HolderData extends  RecyclerView.ViewHolder{

        TextView image, nama_pemilik, alamat, nohp, email;
        DataProfil dm;

        @SuppressLint("WrongViewCast")
        public HolderData (View v)
        {
            super(v);

            image  = (TextView) v.findViewById(R.id.tvimg);
            nama_pemilik = (TextView) v.findViewById(R.id.tvnama);
            alamat = (TextView) v.findViewById(R.id.tvalamat);
            nohp = (TextView) v.findViewById(R.id.tvnohp);
            email = (TextView) v.findViewById(R.id.tvemail);

            v.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent goInput = new Intent(ctx, TmpProfilActivity.class);
                    goInput.putExtra("id_pemilik", dm.getId_pemilik());
                    goInput.putExtra("image", dm.getImage());
                    goInput.putExtra("nama_pemilik", dm.getNama_pemilik());
                    goInput.putExtra("alamat", dm.getAlamat());
                    goInput.putExtra("nohp", dm.getNohp());
                    goInput.putExtra("email", dm.getEmail());

                    ctx.startActivity(goInput);
                }
            });
        }
    }
}