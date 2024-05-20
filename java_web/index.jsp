<%-- 
    Document   : index
    Created on : 19 may 2024, 21:22:15
    Author     : Matias
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="org.json.JSONArray"%>
<%@page import="org.json.JSONObject"%>
<%@page import="com.school.school.ApiConsumer"%>
<%@page import="java.io.UnsupportedEncodingException"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Buscador</h1>
        <form method="get" action="index.jsp">
            <label for="level">Semestre:</label>
            <input type="text" name="level" id="level">
            <label for="parallel">Paralelo:</label>
            <input type="text" name="parallel" id="parallel">
            <button type="submit">Buscar</button>
        </form>
        <%
            String level = request.getParameter("level");
            String parallel = request.getParameter("parallel");

            if (!level.isEmpty() && !parallel.isEmpty()) {
                ApiConsumer consumer = new ApiConsumer();
                JSONArray data = consumer.getFilteredData(level, parallel);
        %>  
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Semestre</th>
                <th>Paralelo</th>
            </tr>
            <tbody>
                <%
                    for (int i = 0; i < data.length(); i++) {
                        JSONObject obj = data.getJSONObject(i);
                %>
                <tr>
                    <td><%=obj.get("name")%></td>
                    <td><%=obj.get("lastName")%></td>
                    <td><%=obj.get("level")%></td>
                    <td><%=obj.get("parallel")%></td>
                </tr>
                <%}%>
            </tbody>
        </table>
        <%
            }
        %>
    </body>
</html>
