/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.beans.Statement;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.*;
import java.math.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author jimmywu
 */
@WebServlet(urlPatterns = {"/Overview"})
public class Overview extends HttpServlet {
    
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";
        static final String DB_URL = "jdbc::mysql:://sylvester-mccoy-v3.ics.uci.edu/inf124grp14";
        
        static final String USER = "inf124grp14";
        static final String PASSWORD = "W6uP=epe";
        
        response.setContentType("text/html");
        
        
        PrintWriter out = response.getWriter();
        String title = "Database Result";
                
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            
            Connection connection = DriverManager.getConnection(DB_URL, USER, PASSWORD);
            Statement statement = (Statement) connection.createStatement();
            String sql = "";
            ResultSet rs = statement.executeQuery(sql);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Overview.class.getName()).log(Level.SEVERE, null, ex);
        } catch (SQLException se) {
            se.printStackTrace();
        }
}



    


    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<style>\n" +
                "table, th, td {\n" +
                "border: 1px solid black;\n" +
                "}\n" +
                "th {\n" +
                "color:#531C53\n" +
                "}\n" +
                "th, td {\n" +
                "text-align: center;\n" +
                "}\n" +
                "body {\n" +
                "background-color:beige;\n" +
                "}\n" +
                ".productImage:hover {\n" +
                "transform: scale(2, 2);\n" +
                "opacity: 1;\n" +
                "}\n" +
                "\n" +
                "</style>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<center><p style=\"font-size:58px; display:inline-block; color:#5C7A84\">Balls To The Walls Emporium</p></center>");
            out.println("</body>");
            out.println("</html>");
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
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
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
