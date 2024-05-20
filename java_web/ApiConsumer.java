/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.school.school;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.net.URI;
import java.net.URLEncoder;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import org.json.JSONArray;
import org.json.JSONException;

/**
 *
 * @author Matias
 */
public class ApiConsumer {

    public static String URL = "http://localhost/Quinto/api/controllers/endpoint.php";
    private final HttpClient HTTP;

    public ApiConsumer() {
        this.HTTP = HttpClient.newHttpClient();
    }

    public JSONArray getFilteredData(String level, String parallel) throws UnsupportedEncodingException {
        String updatedUrl = URL + "?level=" + URLEncoder.encode(level) + "&parallel=" + URLEncoder.encode(parallel);

        try {
            HttpRequest request = HttpRequest.newBuilder()
                    .uri(URI.create(updatedUrl))
                    .GET()
                    .build();
            HttpResponse<String> response = HTTP.send(request, HttpResponse.BodyHandlers.ofString());

            return new JSONArray(response.body());
        } catch (IOException | InterruptedException | JSONException e) {
            System.out.println("NO SE HA EJECUTADO");
            e.getMessage();
        }
        return null;
    }

}
