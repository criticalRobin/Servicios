/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package com.school.frontschoolapi;

import java.util.List;

/**
 *
 * @author Matias
 */
public interface ApiConsumerInterface<T> {

    List<T> listAll();

    List<T> listFiltered(String level, String parallel);

    boolean create(T entity);

    boolean update(T entity);

    boolean delete(String id);
}
