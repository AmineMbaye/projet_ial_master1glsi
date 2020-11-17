package server;


import metier.UserService;

import javax.xml.ws.Endpoint;



public class SoapServer
{
    public static void main(String[] args)
    {
        String url = "http://192.168.43.222:5500/";
    
        Endpoint.publish(url, new UserService());

        
		System.out.println("Le serveur a été démarré sur : "+ url+"UserService"+"?wsdl");
    }
}
