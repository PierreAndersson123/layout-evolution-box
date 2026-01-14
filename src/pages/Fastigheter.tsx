import { useState } from "react";
import { Layout } from "@/components/layout/Layout";
import { HeroSection } from "@/components/ui/HeroSection";
import { PropertyCard } from "@/components/ui/PropertyCard";
import { SectionTitle } from "@/components/ui/SectionTitle";
import { Search, X, ChevronDown } from "lucide-react";

import propertyHero from "@/assets/property-hero.jpg";
import property1 from "@/assets/property-1.jpg";
import property2 from "@/assets/property-2.jpg";
import property3 from "@/assets/property-3.jpg";
import property4 from "@/assets/property-4.jpg";
import officeInterior1 from "@/assets/office-interior-1.jpg";
import officeInterior2 from "@/assets/office-interior-2.jpg";

const properties = [
  {
    id: 1,
    image: property1,
    title: "Centrum Plaza",
    location: "Malmö Centrum",
    area: "2 500 m²",
    type: "Kontor",
    description: "Modernt kontorshus i centrala Malmö med flexibla lokaler och utmärkt tillgänglighet.",
    gallery: [property1, officeInterior1, officeInterior2],
  },
  {
    id: 2,
    image: property2,
    title: "Industrigatan 8",
    location: "Västra Hamnen",
    area: "1 800 m²",
    type: "Kontor & Butik",
    description: "Historisk byggnad med modern touch i populära Västra Hamnen.",
    gallery: [property2, officeInterior1],
  },
  {
    id: 3,
    image: property3,
    title: "Parkvillan",
    location: "Limhamn",
    area: "3 200 m²",
    type: "Kontor",
    description: "Grön och lugn kontorsmiljö med fokus på välbefinnande och produktivitet.",
    gallery: [property3, officeInterior2],
  },
  {
    id: 4,
    image: property4,
    title: "Eco Business Center",
    location: "Hyllie",
    area: "4 100 m²",
    type: "Kontor",
    description: "Miljöcertifierat kontorskomplex med solpaneler och hållbara lösningar.",
    gallery: [property4, officeInterior1, officeInterior2],
  },
  {
    id: 5,
    image: officeInterior1,
    title: "Söder Office",
    location: "Möllevången",
    area: "1 200 m²",
    type: "Kontor",
    description: "Kreativt kontorsutrymme med öppen planlösning i trendig stadsdel.",
    gallery: [officeInterior1, property1],
  },
  {
    id: 6,
    image: officeInterior2,
    title: "Nordic Hub",
    location: "Malmö Centrum",
    area: "2 800 m²",
    type: "Kontor",
    description: "Skandinaviskt designat kontor med fokus på ljus och öppenhet.",
    gallery: [officeInterior2, property2],
  },
];

const areas = ["Alla områden", "Malmö Centrum", "Västra Hamnen", "Limhamn", "Hyllie", "Möllevången"];
const types = ["Alla typer", "Kontor", "Kontor & Butik", "Lager"];

interface PropertyModalProps {
  property: typeof properties[0];
  onClose: () => void;
}

function PropertyModal({ property, onClose }: PropertyModalProps) {
  const [activeImage, setActiveImage] = useState(0);

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-foreground/50">
      <div className="bg-background rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-auto">
        {/* Header */}
        <div className="flex items-center justify-between p-6 border-b border-border">
          <h2 className="text-2xl font-semibold">{property.title}</h2>
          <button
            onClick={onClose}
            className="p-2 hover:bg-muted rounded-lg transition-colors btn-touch"
            aria-label="Stäng"
          >
            <X size={24} />
          </button>
        </div>

        {/* Gallery */}
        <div className="p-6">
          <div className="aspect-video rounded-lg overflow-hidden mb-4">
            <img
              src={property.gallery[activeImage]}
              alt={property.title}
              className="w-full h-full object-cover"
            />
          </div>
          {property.gallery.length > 1 && (
            <div className="flex gap-2">
              {property.gallery.map((img, idx) => (
                <button
                  key={idx}
                  onClick={() => setActiveImage(idx)}
                  className={`w-20 h-16 rounded overflow-hidden border-2 transition-colors ${
                    activeImage === idx ? "border-primary" : "border-transparent"
                  }`}
                >
                  <img src={img} alt="" className="w-full h-full object-cover" />
                </button>
              ))}
            </div>
          )}
        </div>

        {/* Details */}
        <div className="p-6 pt-0 space-y-4">
          <div className="flex flex-wrap gap-4 text-sm">
            <span className="px-3 py-1 bg-muted rounded-full">{property.location}</span>
            <span className="px-3 py-1 bg-muted rounded-full">{property.area}</span>
            <span className="px-3 py-1 bg-muted rounded-full">{property.type}</span>
          </div>
          <p className="text-muted-foreground">{property.description}</p>
          <button className="w-full py-3 bg-primary text-primary-foreground font-medium rounded-lg hover:bg-primary/90 transition-colors">
            Kontakta oss om denna fastighet
          </button>
        </div>
      </div>
    </div>
  );
}

const Fastigheter = () => {
  const [searchQuery, setSearchQuery] = useState("");
  const [selectedArea, setSelectedArea] = useState("Alla områden");
  const [selectedType, setSelectedType] = useState("Alla typer");
  const [selectedProperty, setSelectedProperty] = useState<typeof properties[0] | null>(null);

  const filteredProperties = properties.filter((property) => {
    const matchesSearch = property.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                         property.location.toLowerCase().includes(searchQuery.toLowerCase());
    const matchesArea = selectedArea === "Alla områden" || property.location === selectedArea;
    const matchesType = selectedType === "Alla typer" || property.type === selectedType;
    return matchesSearch && matchesArea && matchesType;
  });

  return (
    <Layout>
      {/* Hero */}
      <HeroSection
        title="Fastigheter"
        subtitle="Upptäck vårt varierade bestånd av kommersiella fastigheter"
        backgroundImage={propertyHero}
        height="medium"
      />

      {/* Filter Section */}
      <section className="py-8 border-b border-border sticky top-16 md:top-20 z-30 bg-background">
        <div className="container-site">
          <div className="flex flex-col md:flex-row gap-4">
            {/* Search */}
            <div className="relative flex-1">
              <Search size={20} className="absolute left-4 top-1/2 -translate-y-1/2 text-muted-foreground" />
              <input
                type="text"
                placeholder="Sök fastighet..."
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                className="w-full pl-12 pr-4 py-3 rounded-lg border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary"
              />
            </div>

            {/* Area Filter */}
            <div className="relative">
              <select
                value={selectedArea}
                onChange={(e) => setSelectedArea(e.target.value)}
                className="appearance-none w-full md:w-48 px-4 py-3 pr-10 rounded-lg border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary"
              >
                {areas.map((area) => (
                  <option key={area} value={area}>{area}</option>
                ))}
              </select>
              <ChevronDown size={20} className="absolute right-4 top-1/2 -translate-y-1/2 text-muted-foreground pointer-events-none" />
            </div>

            {/* Type Filter */}
            <div className="relative">
              <select
                value={selectedType}
                onChange={(e) => setSelectedType(e.target.value)}
                className="appearance-none w-full md:w-48 px-4 py-3 pr-10 rounded-lg border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary"
              >
                {types.map((type) => (
                  <option key={type} value={type}>{type}</option>
                ))}
              </select>
              <ChevronDown size={20} className="absolute right-4 top-1/2 -translate-y-1/2 text-muted-foreground pointer-events-none" />
            </div>
          </div>
        </div>
      </section>

      {/* Properties Grid */}
      <section className="section-padding">
        <div className="container-site">
          <SectionTitle 
            title={`${filteredProperties.length} fastigheter`}
            subtitle="Klicka på en fastighet för mer information"
          />
          <div className="grid-properties">
            {filteredProperties.map((property) => (
              <PropertyCard
                key={property.id}
                {...property}
                onClick={() => setSelectedProperty(property)}
              />
            ))}
          </div>
          {filteredProperties.length === 0 && (
            <div className="text-center py-16">
              <p className="text-muted-foreground">Inga fastigheter matchar din sökning.</p>
            </div>
          )}
        </div>
      </section>

      {/* Property Modal */}
      {selectedProperty && (
        <PropertyModal
          property={selectedProperty}
          onClose={() => setSelectedProperty(null)}
        />
      )}
    </Layout>
  );
};

export default Fastigheter;
