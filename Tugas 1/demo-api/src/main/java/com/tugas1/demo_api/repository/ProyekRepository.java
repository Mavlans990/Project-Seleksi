package com.tugas1.demo_api.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.tugas1.demo_api.model.Proyek;

public interface ProyekRepository extends JpaRepository<Proyek, Long> {
}
