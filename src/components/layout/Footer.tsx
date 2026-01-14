import { Link } from "react-router-dom";
import { Mail, Phone, MapPin } from "lucide-react";

const quickLinks = [
  { href: "/", label: "Hem" },
  { href: "/om-oss", label: "Om oss" },
  { href: "/fastigheter", label: "Fastigheter" },
  { href: "/projektutveckling", label: "Projektutveckling" },
  { href: "/lediga-lokaler", label: "Lediga lokaler" },
];

export function Footer() {
  return (
    <footer className="bg-foreground text-primary-foreground">
      <div className="container-site py-16">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
          {/* Contact Column */}
          <div>
            <h3 className="text-lg font-semibold mb-6">Kontakt</h3>
            <ul className="space-y-4">
              <li className="flex items-start gap-3">
                <MapPin size={20} className="mt-1 flex-shrink-0 opacity-70" />
                <span className="opacity-80">
                  Storgatan 1<br />
                  211 34 Malmö
                </span>
              </li>
              <li>
                <a 
                  href="tel:+46401234567" 
                  className="flex items-center gap-3 opacity-80 hover:opacity-100 transition-opacity"
                >
                  <Phone size={20} className="flex-shrink-0 opacity-70" />
                  040-123 45 67
                </a>
              </li>
              <li>
                <a 
                  href="mailto:info@testforetag.se" 
                  className="flex items-center gap-3 opacity-80 hover:opacity-100 transition-opacity"
                >
                  <Mail size={20} className="flex-shrink-0 opacity-70" />
                  info@testforetag.se
                </a>
              </li>
            </ul>
          </div>

          {/* Quick Links Column */}
          <div>
            <h3 className="text-lg font-semibold mb-6">Snabblänkar</h3>
            <ul className="space-y-3">
              {quickLinks.map((link) => (
                <li key={link.href}>
                  <Link 
                    to={link.href}
                    className="opacity-80 hover:opacity-100 transition-opacity"
                  >
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Newsletter Column */}
          <div>
            <h3 className="text-lg font-semibold mb-6">Nyhetsbrev</h3>
            <p className="opacity-80 mb-4">
              Prenumerera på vårt nyhetsbrev för att få de senaste nyheterna.
            </p>
            <form className="flex flex-col sm:flex-row gap-3">
              <input
                type="email"
                placeholder="Din e-postadress"
                className="flex-1 px-4 py-3 rounded-lg bg-primary-foreground/10 border border-primary-foreground/20 text-primary-foreground placeholder:text-primary-foreground/50 focus:outline-none focus:ring-2 focus:ring-primary-foreground/30"
              />
              <button
                type="submit"
                className="px-6 py-3 bg-primary-foreground text-foreground font-medium rounded-lg hover:bg-primary-foreground/90 transition-colors btn-touch"
              >
                Prenumerera
              </button>
            </form>
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-primary-foreground/10">
        <div className="container-site py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
          <p className="text-sm opacity-60">
            © {new Date().getFullYear()} Testföretag. Alla rättigheter förbehållna.
          </p>
          <div className="flex items-center gap-6 text-sm">
            <a href="#" className="opacity-60 hover:opacity-100 transition-opacity">
              Cookies
            </a>
            <a href="#" className="opacity-60 hover:opacity-100 transition-opacity">
              Integritetspolicy
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}
