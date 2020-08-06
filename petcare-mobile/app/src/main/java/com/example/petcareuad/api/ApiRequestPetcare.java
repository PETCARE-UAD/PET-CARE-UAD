package com.example.petcareuad.api;

import com.example.petcareuad.model.ResponsModelProfil;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiRequestPetcare {

    @FormUrlEncoded
    @POST("insert_profil.php")
    Call<ResponsModelProfil> sendtb_pemilikhewan(@Field("image") String image,
                                                @Field("nama_pemilik") String nama_pemilik,
                                                @Field("alamat") String alamat,
                                                @Field("nohp") String nohp,
                                                @Field("email") String email);

    @GET("baca.php")
    Call<ResponsModelProfil> getdb_petcare();

}
