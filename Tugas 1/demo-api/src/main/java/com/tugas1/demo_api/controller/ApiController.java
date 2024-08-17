package com.tugas1.demo_api.controller;

import java.time.LocalDateTime;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.tugas1.demo_api.model.Lokasi;
import com.tugas1.demo_api.model.Proyek;
import com.tugas1.demo_api.repository.LokasiRepository;
import com.tugas1.demo_api.repository.ProyekRepository;

@RestController
@RequestMapping(value = "/api", method = RequestMethod.POST)
public class ApiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @Autowired
    private ProyekRepository proyekRepository;

    @PostMapping("/lokasi")
    public Lokasi addLokasi(@RequestBody Lokasi lokasi) {
        lokasi.setCreatedAt(LocalDateTime.now());
        return lokasiRepository.save(lokasi);
    }

    @GetMapping("/lokasi")
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    @PutMapping("/lokasi/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable Long id, @RequestBody Lokasi updatedLokasi) {
        Optional<Lokasi> lokasi = lokasiRepository.findById(id);
        if (lokasi.isPresent()) {
            Lokasi lokasiEntity = lokasi.get();
            lokasiEntity.setNamaLokasi(updatedLokasi.getNamaLokasi());
            lokasiEntity.setNegara(updatedLokasi.getNegara());
            lokasiEntity.setProvinsi(updatedLokasi.getProvinsi());
            lokasiEntity.setKota(updatedLokasi.getKota());
            return ResponseEntity.ok(lokasiRepository.save(lokasiEntity));
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @DeleteMapping("/lokasi/{id}")
    public ResponseEntity<Void> deleteLokasi(@PathVariable Long id) {
        if (lokasiRepository.existsById(id)) {
            lokasiRepository.deleteById(id);
            return ResponseEntity.ok().build();
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @PostMapping("/proyek")
    public Proyek addProyek(@RequestBody Proyek proyek) {
        proyek.setCreatedAt(LocalDateTime.now());
        return proyekRepository.save(proyek);
    }

    @GetMapping("/proyek")
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    @PutMapping("/proyek/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable Long id, @RequestBody Proyek updatedProyek) {
        Optional<Proyek> proyek = proyekRepository.findById(id);
        if (proyek.isPresent()) {
            Proyek proyekEntity = proyek.get();
            proyekEntity.setNamaProyek(updatedProyek.getNamaProyek());
            proyekEntity.setClient(updatedProyek.getClient());
            proyekEntity.setTglMulai(updatedProyek.getTglMulai());
            proyekEntity.setTglSelesai(updatedProyek.getTglSelesai());
            proyekEntity.setPimpinanProyek(updatedProyek.getPimpinanProyek());
            proyekEntity.setKeterangan(updatedProyek.getKeterangan());
            proyekEntity.setLokasi(updatedProyek.getLokasi());
            return ResponseEntity.ok(proyekRepository.save(proyekEntity));
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @DeleteMapping("/proyek/{id}")
    public ResponseEntity<Void> deleteProyek(@PathVariable Long id) {
        if (proyekRepository.existsById(id)) {
            proyekRepository.deleteById(id);
            return ResponseEntity.ok().build();
        } else {
            return ResponseEntity.notFound().build();
        }
    }
}