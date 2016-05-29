/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.sql.*;
import java.util.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletContext;

/**
 *
 * @author Allen T
 */
//@WebServlet(urlPatterns = {"/ProductDetails"})
public class ProductDetails extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     * @throws java.lang.ClassNotFoundException
     * @throws java.sql.SQLException
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, ClassNotFoundException, SQLException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {

            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection(
                "jdbc:mysql://sylvester-mccoy-v3.ics.uci.edu/inf124grp14",
                "inf124grp14",
                "W6uP=epe");
            
            // If the connection was successful, create a result set object
            Statement stmt = null;
            ResultSet rs = null;
            String itemId = request.getParameter("id");
            int Id = Integer.parseInt(request.getParameter("id"));
            
            //SQL query command
            String SQL = "SELECT * FROM Product WHERE item_id=" + itemId;
            stmt = con.createStatement();
            rs = stmt.executeQuery(SQL);
            
                        /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<script type=\"text/javascript\" src=\"jquery.js\"></script>" +
                        "<link href=\"bootstrap.min.css\" rel=\"stylesheet\">" +
                        "<link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css\" rel=\"stylesheet\" integrity=\"sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1\" crossorigin=\"anonymous\">" +
                        "<script src=\"bootstrap.min.js\"></script>");
            out.println("<script>"
                    + "$(window).on('beforeunload', function () {" +
                    " $.ajax({" +
                    "        type: 'POST'," +
                    "        async: true," +
                    "        url: 'http://andromeda-14.ics.uci.edu:1337/ProductDetails?id=" + Id + "'," +
                    "        done:function(){" +
                    "          console.log('memcache deleted');" +
                    "      }" +
                    "    });" +
                    "});"
                    + "</script>");
            out.println("</head>");
            out.println("<style>");
            out.println("td {"
                    + "text-align: left;"
                    + "}");
            out.println(
                    "table{" +
                    "    background-color: beige;" +
                    "}" +
                    "body {" +
                    "    background-color:beige;" +
                    "}" +
                    "pre{" +
                    "    background-color: beige;" +
                    "}" +
                    "table-hover{" +
                    "    background-color: #A49480; " +
                    "}");
            out.println("</style>");
            out.println("<body>");
            out.println("<div class=\"container-fluid\">" +
                        "<div class=\"row\">" +
                        "<div class=\"container\">" +
                        "<pre>");
            out.println("<div style=\"text-align: center;\">");
            out.println("<a href=\"index.jsp\" type=\"button\" class=\"btn btn-default btn-lg\" style=\"float: left;\">" +
                        "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i> Back" +
                        "</a>");
            out.println("<a href=\"\\Cart\" type=\"button\" class=\"btn btn-default btn-lg\" style=\"float: right;\">" +
                        "<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i> View Cart" +
                        "</a>");

            while (rs.next()) {
                out.println("<img src=\"" + request.getContextPath() + "/resources/" + rs.getString("photo") + 
                        "\" alt='Image not found' width='150' height='150' class='productImage' style=\"display: inline-block\">");
                out.println("</div>");
                
                out.println("<table class=\"table\" style=\"text-align:center;\">");
                out.println("<tr><td>" + "Name: " + "</td>");
                out.println("<td>" +  rs.getString("name") + "</td></tr>");
                
                out.println("<tr><td>" + "Price: " + "</td>");
                out.println("<td>$" + rs.getInt("price") + ".00</td></tr>");
                
                out.println("<tr><td>" + "Color: " + "</td>");
                out.println("<td>" + rs.getString("color") + "</td></tr>");
                
                out.println("<tr><td>" + "Description: " + "</td>");
                out.println("<td style=\"white-space:normal;\">" + rs.getString("description") + "</td></tr>");
                
                out.println("<tr><td>" + "Shape: " + "</td>");
                out.println("<td>" + rs.getString("shape") + "</td></tr>");
                
                out.println("<tr><td>" + "Circumference: " + "</td>");
                out.println("<td>" + rs.getString("circumference") + "</td></tr>");
                
                out.println("<tr><td>" + "Weight: " + "</td>");
                out.println("<td>" + rs.getString("weight") + "</td></tr>");
                
                out.println("<tr><td>" + "Material: " + "</td>");
                out.println("<td>" + rs.getString("material") + "</td></tr>");
                
                out.println("</tr>");
                
                out.println("</table>");
                
                out.println("<a type=\"button\" class=\"btn btn-primary btn-lg pull-right\" role=\"button\" href=\"/Cart?id=" + rs.getInt("item_id") + "\">"
                    + "<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i> Add to Cart</a>");
            }

            
            HttpSession s = request.getSession(true);

            ArrayList viewedItems;
            if(s.getAttribute("lastViewedItems") == null){
                viewedItems = new ArrayList<Object>();
            }
            else {
                viewedItems = (ArrayList) s.getAttribute("lastViewedItems");
            }
            if(viewedItems.contains(request.getParameter("id"))){
                viewedItems.remove(viewedItems.indexOf(request.getParameter("id")));
            }
            else if(viewedItems.size()==5){
                viewedItems.remove(0);
            }
            viewedItems.add(request.getParameter("id"));
            s.setAttribute("lastViewedItems", viewedItems);  
            
            if(getServletContext().getAttribute(itemId) == null) {
                    getServletContext().setAttribute(itemId, 0);
            }
            int currViewers = (int) getServletContext().getAttribute(itemId);
            out.println("<button type=\"button\" class=\"btn btn-primary btn-lg pull-left\" role=\"button\">"
                    + "<i class=\"fa fa-user\" aria-hidden=\"true\"></i> " + currViewers +
                    " other user(s) viewing.</button>");
            
            currViewers++;
            getServletContext().setAttribute(itemId, currViewers);
            
           

            out.println("</div>" + 
                    "</div>" + 
                    "</div>" + 
                    "</pre>");
            out.println("</body>");
            out.println("</html>");
            
            out.flush();
            out.close();
            
            con.close();
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException e) {
            try {
                throw new ClassNotFoundException("HELP");
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(ProductDetails.class.getName()).log(Level.SEVERE, null, ex);
            }
        } catch (SQLException e) {
            try {
                throw new SQLException("HELP");
            } catch (SQLException ex) {
                Logger.getLogger(ProductDetails.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }
    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String Id = request.getParameter("id");

        int currViewers = (int) getServletContext().getAttribute(Id);
        if (currViewers == 0) {
            return;
        }

        --currViewers;
        getServletContext().setAttribute(Id, currViewers);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
