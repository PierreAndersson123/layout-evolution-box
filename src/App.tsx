import { Toaster } from "@/components/ui/toaster";
import { Toaster as Sonner } from "@/components/ui/sonner";
import { TooltipProvider } from "@/components/ui/tooltip";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Index from "./pages/Index";
import OmOss from "./pages/OmOss";
import Fastigheter from "./pages/Fastigheter";
import Projektutveckling from "./pages/Projektutveckling";
import LedigaLokaler from "./pages/LedigaLokaler";
import NotFound from "./pages/NotFound";

const queryClient = new QueryClient();

const App = () => (
  <QueryClientProvider client={queryClient}>
    <TooltipProvider>
      <Toaster />
      <Sonner />
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Index />} />
          <Route path="/om-oss" element={<OmOss />} />
          <Route path="/fastigheter" element={<Fastigheter />} />
          <Route path="/projektutveckling" element={<Projektutveckling />} />
          <Route path="/lediga-lokaler" element={<LedigaLokaler />} />
          <Route path="*" element={<NotFound />} />
        </Routes>
      </BrowserRouter>
    </TooltipProvider>
  </QueryClientProvider>
);

export default App;
