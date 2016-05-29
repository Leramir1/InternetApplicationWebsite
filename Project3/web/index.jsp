<%-- 
    Document   : db
    Created on : May 28, 2016, 1:57:32 PM
    Author     : Allen T
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>
<%@page isELIgnored="false"%>
<%@page import="java.util.ArrayList"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="jquery.js"></script>
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap.min.js"></script>
        <title>JSP Page</title>
        <style>
            table{
                background-color: beige;
            }
            th {
                color:#531C53
            }
            th, td {
                text-align: center;
            }
            body {
                background-color:beige;
            }
            .btn-primary{
                background-color: #5C7A84;
                border-color: #5C7A84;
            }
            pre{
                background-color: beige;
            }
            table-hover{
                background-color: #A49480; 
            }
            .modal-body p {
                word-wrap: break-word;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <center><h1 style="font-size:58px; display:inline-block; color:#5C7A84">Balls To The Walls Emporium</h1></center>
            <div class="row">
                <div class="col-lg-6">
                <pre>
                <div class="container-fluid">
                    <table class="table table-hover">
                        <thead>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Image</th>
                        </thead>
                        <tbody>
                                <%-- START --%>
                                <%
                                    Class.forName("com.mysql.jdbc.Driver");
                                    Connection con = DriverManager.getConnection(
                                            "jdbc:mysql://sylvester-mccoy-v3.ics.uci.edu/inf124grp14",
                                            "inf124grp14",
                                            "W6uP=epe");

                                    // If the connection was successful, create a result set object
                                    Statement stmt = null;
                                    ResultSet rs = null;
                                    //SQL query command
                                    String SQL = "SELECT * FROM Product";
                                    stmt = con.createStatement();
                                    rs = stmt.executeQuery(SQL);

                                    while (rs.next()) {
                                        out.println("<tr>");
                                        out.println("<td>" + rs.getString("name") + "</td>");
                                        out.println("<td>$" + rs.getInt("price") + ".00</td>");
                                        out.println("<td>" + rs.getString("color") + "</td>");
                                        out.println("<td>" + "<div class=\"row\"><img src=\"" + request.getContextPath() + "/resources/" + rs.getString("photo")
                                                + "\" alt='Image not found' width='150' height='150' class='productImage'>" + "</div>");
                                        out.println("<div class=\"row\">"
                                                + "<a type=\"button\" class=\"btn btn-primary btn-lg\" role=\"button\" href=\"/ProductDetails?id=" + rs.getInt("item_id")
                                                + "\">View Product</a>"
                                                + "</div></td>");
                                    }

                                    con.close();
                                %>
                                <%-- END --%>
                        </tbody>
                    </table>
                </div>
                </pre>
                </div>
                <div class="col-lg-6">
                <pre>
                <div class="container-fluid">
                        <table class="table table-hover">
                        <thead>
                            <th>Recently Viewed Items</th>
                        </thead>
                        <tbody>
                                    <%-- START --%>
                                    <%
                                        Class.forName("com.mysql.jdbc.Driver");
                                        Connection con2 = DriverManager.getConnection(
                                                "jdbc:mysql://sylvester-mccoy-v3.ics.uci.edu/inf124grp14",
                                                "inf124grp14",
                                                "W6uP=epe");

                                        // If the connection was successful, create a result set object
                                        Statement stmt2 = null;
                                        ResultSet rs2 = null;
                                        //SQL query command

                                        
                                        HttpSession s = request.getSession(true);
                                        ArrayList viewedItems = (ArrayList) s.getAttribute("lastViewedItems");
                                        if (viewedItems != null) {

                                            for (int i = viewedItems.size() - 1; i > -1; i--) {
                                                String SQL2 = "SELECT * FROM Product WHERE item_id=" + viewedItems.get(i);
                                                stmt2 = con2.createStatement();
                                                rs2 = stmt2.executeQuery(SQL2);
                                                
                                                while (rs2.next()) {
                                                    out.println("<tr>");
                                                    out.println("<td>" + rs2.getString("name") + "</td>");
                                                    out.println("<td>$" + rs2.getInt("price") + ".00</td>");
                                                    out.println("<td>" + "<div class=\"row\"><img src=\"" + request.getContextPath() + "/resources/" + rs2.getString("photo")
                                                        + "\" alt='Image not found' width='100' height='100' class='productImage'>" + "</div>");
                                                    out.println("<div class=\"row\">"
                                                        + "<a type=\"button\" class=\"btn btn-primary\" role=\"button\" href=\"/ProductDetails?id=" + rs2.getInt("item_id")
                                                        + "\">View Product</a>"
                                                        + "</div></td>");
                                                }
                                            }
                                        }
                                        //                            if(getServletContext().getAttribute("access_count") == null) {
                                        //                                getServletContext().setAttribute("access_count", 0);
                                        //                            }
                                        //                            int accessCount = (int) getServletContext().getAttribute("access_count");
                                        //                            accessCount++;
                                        //                            getServletContext().setAttribute("access_count", accessCount);
                                        con2.close();
                                    %>
                                    <%-- END --%>
                        </tbody>
                        </table>
                    </div>
                </pre>
                </div>
            </div>
        </div>
    </body>
</html>
