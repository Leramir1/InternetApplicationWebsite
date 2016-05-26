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

/**
 *
 * @author jimmywu
 */
@WebServlet(urlPatterns = {"/index"})
public class Index extends HttpServlet {

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
            out.println("<title>Balls to the Wall!</title>\n" +
                    "<style>body{"+
                    "background-color:white;"+
                    "text-align: center;}"+
                    "h1{"+
                        "font-size:40px;"
                    + "}</style>"
            );         
            out.println("</head>");
            out.println("<body>");
//            out.println("<h1>Servlet index at " + request.getContextPath() + "</h1>");
            out.println("<h1>Balls To the Walls Emporium</h1>\n" +
                "<pre>\n"+ 
                "<img src='/resources/products.jpg'>\n" +
                "Hello! Welcome to the official homepage for Balls To the Walls Emporium! \n" +
                "We are a specialty storein the business of selling you balls of all kinds.\n" +
                "We got basketballs, baseballs,footballs and so much more just waiting for you! \n" +
                "Any sport, any activity, we got youcovered!\n" +
                "Our store has just officially had its grand opening and its today! \n" +
                "All prices are $19.99! \n" +
                "Our team: Luis Ramirez, Allen Thich, Vonnie Wu, and Jimmy Wu \n" +
                "are just waiting to help you find the perfect ball for your sport!\n" +
                "</pre>\n" +
                "<a href=\"Overview\">Click Here to Continue to Store</a>");
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
