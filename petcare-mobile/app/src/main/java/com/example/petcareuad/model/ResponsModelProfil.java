package com.example.petcareuad.model;

import java.util.List;

public class ResponsModelProfil {

    String  kode, pesan;
    List<DataProfil> result;

    public List<DataProfil> getResult() {
        return result;
    }

    public void setResult(List<DataProfil> result) {
        this.result = result;
    }

    public String getKode() {
        return kode;
    }

    public void setKode(String kode) {
        this.kode = kode;
    }

    public String getPesan() {
        return pesan;
    }

    public void setPesan(String pesan) {
        this.pesan = pesan;
    }

}
