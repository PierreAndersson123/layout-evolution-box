import { useState } from "react";
import { X } from "lucide-react";

export function CookieConsent() {
  const [isVisible, setIsVisible] = useState(true);
  const [showSettings, setShowSettings] = useState(false);

  if (!isVisible) return null;

  return (
    <>
      {/* Cookie Bar */}
      <div className="fixed bottom-0 left-0 right-0 z-50 bg-background border-t border-border shadow-lg">
        <div className="container-site py-4">
          <div className="flex flex-col sm:flex-row items-center justify-between gap-4">
            <p className="text-sm text-muted-foreground text-center sm:text-left">
              Vi använder cookies för att förbättra din upplevelse på vår webbplats.
            </p>
            <div className="flex items-center gap-3">
              <button
                onClick={() => setShowSettings(true)}
                className="px-4 py-2 text-sm font-medium text-muted-foreground hover:text-foreground transition-colors btn-touch"
              >
                Inställningar
              </button>
              <button
                onClick={() => setIsVisible(false)}
                className="px-4 py-2 text-sm font-medium border border-border rounded-lg hover:bg-muted transition-colors btn-touch"
              >
                Avvisa
              </button>
              <button
                onClick={() => setIsVisible(false)}
                className="px-4 py-2 text-sm font-medium bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors btn-touch"
              >
                Acceptera
              </button>
            </div>
          </div>
        </div>
      </div>

      {/* Settings Modal */}
      {showSettings && (
        <div className="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-foreground/50">
          <div className="bg-background rounded-lg shadow-xl max-w-lg w-full max-h-[90vh] overflow-auto">
            <div className="flex items-center justify-between p-6 border-b border-border">
              <h2 className="text-xl font-semibold">Cookie-inställningar</h2>
              <button
                onClick={() => setShowSettings(false)}
                className="p-2 hover:bg-muted rounded-lg transition-colors btn-touch"
                aria-label="Stäng"
              >
                <X size={20} />
              </button>
            </div>
            <div className="p-6 space-y-6">
              <div className="space-y-4">
                <div className="flex items-center justify-between">
                  <div>
                    <h3 className="font-medium">Nödvändiga cookies</h3>
                    <p className="text-sm text-muted-foreground">
                      Dessa cookies är nödvändiga för webbplatsens funktion.
                    </p>
                  </div>
                  <div className="text-sm text-muted-foreground">Alltid på</div>
                </div>
                <div className="flex items-center justify-between">
                  <div>
                    <h3 className="font-medium">Analytiska cookies</h3>
                    <p className="text-sm text-muted-foreground">
                      Hjälper oss att förstå hur besökare använder webbplatsen.
                    </p>
                  </div>
                  <label className="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" className="sr-only peer" />
                    <div className="w-11 h-6 bg-muted rounded-full peer peer-checked:bg-primary transition-colors"></div>
                  </label>
                </div>
                <div className="flex items-center justify-between">
                  <div>
                    <h3 className="font-medium">Marknadsföringscookies</h3>
                    <p className="text-sm text-muted-foreground">
                      Används för att visa relevanta annonser.
                    </p>
                  </div>
                  <label className="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" className="sr-only peer" />
                    <div className="w-11 h-6 bg-muted rounded-full peer peer-checked:bg-primary transition-colors"></div>
                  </label>
                </div>
              </div>
            </div>
            <div className="flex justify-end gap-3 p-6 border-t border-border">
              <button
                onClick={() => setShowSettings(false)}
                className="px-6 py-2 text-sm font-medium border border-border rounded-lg hover:bg-muted transition-colors"
              >
                Avbryt
              </button>
              <button
                onClick={() => {
                  setShowSettings(false);
                  setIsVisible(false);
                }}
                className="px-6 py-2 text-sm font-medium bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors"
              >
                Spara val
              </button>
            </div>
          </div>
        </div>
      )}
    </>
  );
}
