/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.school.frontschoolapi;

import com.fasterxml.jackson.annotation.JsonProperty;

/**
 *
 * @author Matias
 */
public class Student {

    @JsonProperty("id")
    private String id;
    @JsonProperty("name")
    private String name;
    @JsonProperty("lastName")
    private String lastName;
    @JsonProperty("courseId")
    private String courseId;

    public Student() {
    }

    public Student(String id, String name, String lastName, String courseId) {
        this.id = id;
        this.name = name;
        this.lastName = lastName;
        this.courseId = courseId;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getCourseId() {
        return courseId;
    }

    public void setCourseId(String courseId) {
        this.courseId = courseId;
    }

}
