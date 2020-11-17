package metier;

import java.sql.*;


public class DBConnection
{
	
    private static Connection connect;

    private DBConnection()
    {
        try
        {
            //Class.forName("com.mysql.cj.jdbc.Driver");
            connect = DriverManager.getConnection("jdbc:mysql://localhost:3306/base_project", "root", "");
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    public static Connection getInstance()
    {
        if(connect == null)
        {
            new DBConnection();
            System.out.println("Nouvelle connexion crée...");
        }

        return connect;
    }
}
