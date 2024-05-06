/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.school.frontschoolapi;

import java.util.Arrays;
import java.util.Collections;
import java.util.List;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpMethod;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.client.RestTemplate;
import org.springframework.web.util.UriBuilder;
import org.springframework.web.util.UriComponentsBuilder;

/**
 *
 * @author Matias
 */
public class ApiConsumer implements ApiConsumerInterface<Student> {

    private final String URL = "http://localhost/Quinto/java-api-two/controllers/endpoints.php";
    private final RestTemplate REST = new RestTemplate();

    @Override

    public List<Student> listAll() {
        Student[] students = REST.getForObject(URL, Student[].class);

        return students != null ? Arrays.asList(students) : Collections.emptyList();
    }

    @Override
    public List<Student> listFiltered(String level, String parallel) {
        UriBuilder builder = UriComponentsBuilder.fromHttpUrl(URL)
                .queryParam("level", level)
                .queryParam("parallel", parallel);
        String updatedUrl = builder.toUriString();
        Student[] students = REST.getForObject(updatedUrl, Student[].class);

        return students != null ? Arrays.asList(students) : Collections.emptyList();
    }

    @Override
    public boolean create(Student student) {
        HttpEntity<Student> requestEntity = new HttpEntity<>(student);
        ResponseEntity<Void> responseEntity = REST.exchange(URL, HttpMethod.POST, requestEntity, Void.class);

        return responseEntity.getStatusCode() == HttpStatus.OK;
    }

    @Override
    public boolean update(Student student) {
        UriBuilder builder = UriComponentsBuilder.fromHttpUrl(URL)
                .queryParam("id", student.getId())
                .queryParam("name", student.getName())
                .queryParam("lastName", student.getLastName())
                .queryParam("courseId", student.getCourseId());
        String updatedUrl = builder.toUriString();
        ResponseEntity<Void> responseEntity = REST.exchange(updatedUrl, HttpMethod.PUT, null, Void.class);

        return responseEntity.getStatusCode() == HttpStatus.OK;
    }

    @Override
    public boolean delete(String id) {
        UriBuilder builder = UriComponentsBuilder.fromHttpUrl(URL)
                .queryParam("id", id);
        String updatedUrl = builder.toUriString();
        ResponseEntity<Void> responseEntity = REST.exchange(updatedUrl, HttpMethod.DELETE, null, Void.class);

        return responseEntity.getStatusCode() == HttpStatus.OK;
    }

}
