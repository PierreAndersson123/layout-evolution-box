import { MapPin, Square, Building } from "lucide-react";

interface PropertyCardProps {
  image: string;
  title: string;
  location: string;
  area?: string;
  type?: string;
  description?: string;
  onClick?: () => void;
}

export function PropertyCard({
  image,
  title,
  location,
  area,
  type,
  description,
  onClick,
}: PropertyCardProps) {
  return (
    <article 
      className="card-property cursor-pointer group"
      onClick={onClick}
    >
      {/* Image */}
      <div className="relative aspect-[4/3] overflow-hidden">
        <img
          src={image}
          alt={title}
          className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          loading="lazy"
        />
      </div>
      
      {/* Content */}
      <div className="p-6">
        <h3 className="text-lg font-semibold mb-2 group-hover:text-primary transition-colors">
          {title}
        </h3>
        {description && (
          <p className="text-muted-foreground text-sm mb-4 line-clamp-2">
            {description}
          </p>
        )}
        
        {/* Metadata */}
        <div className="flex flex-wrap items-center gap-4 text-sm text-muted-foreground">
          <div className="flex items-center gap-1.5">
            <MapPin size={16} />
            <span>{location}</span>
          </div>
          {area && (
            <div className="flex items-center gap-1.5">
              <Square size={16} />
              <span>{area}</span>
            </div>
          )}
          {type && (
            <div className="flex items-center gap-1.5">
              <Building size={16} />
              <span>{type}</span>
            </div>
          )}
        </div>
      </div>
    </article>
  );
}
