package com.tugas1.demo_api.model;

import java.time.LocalDateTime;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Lokasi {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String namaLokasi;
    private String negara;
    private String provinsi;
    private String kota;
    private LocalDateTime createdAt;

    

    public Lokasi() {
    }



    public Lokasi(Long id, String namaLokasi, String negara, String provinsi, String kota, LocalDateTime createdAt) {
        this.id = id;
        this.namaLokasi = namaLokasi;
        this.negara = negara;
        this.provinsi = provinsi;
        this.kota = kota;
        this.createdAt = createdAt;
    }



    public Long getId() {
        return id;
    }



    public void setId(Long id) {
        this.id = id;
    }



    public String getNamaLokasi() {
        return namaLokasi;
    }



    public void setNamaLokasi(String namaLokasi) {
        this.namaLokasi = namaLokasi;
    }



    public String getNegara() {
        return negara;
    }



    public void setNegara(String negara) {
        this.negara = negara;
    }



    public String getProvinsi() {
        return provinsi;
    }



    public void setProvinsi(String provinsi) {
        this.provinsi = provinsi;
    }



    public String getKota() {
        return kota;
    }



    public void setKota(String kota) {
        this.kota = kota;
    }



    public LocalDateTime getCreatedAt() {
        return createdAt;
    }



    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }
    
    
    // Constructors, Getters, and Setters
}
