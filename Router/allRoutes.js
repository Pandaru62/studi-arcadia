import Route from "./Route.js";

// Define routes underneath - add new pages
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.php"),
    new Route("/services", "Services", "/pages/services.php"),
    new Route("/habitats", "Services", "/pages/habitats.php"),
    new Route("/contact", "Services", "/pages/contact.php"),
    new Route("/login", "Services", "/pages/login.php"),];

// Display the title
export const websiteName = "Zoo d'Arcadia";