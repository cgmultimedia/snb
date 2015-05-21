(function(self) {
    self.mobileCheck = function () {
        var self = window;
        self.isMobile = 'false';
        self.Mob = '';
        self.isHTC403 = 'false';

        if (/iemobile|windows/i.test(navigator.userAgent)) {
            self.Mob = 'WinOS';
        } else if(!/iphone|ipad|ipod|android/i.test(navigator.userAgent)) {
            self.isMobile = 'false';
            self.Mob = '';
            self.isHTC403 = 'false';
        }
        else {
            self.isMobile = 'true';
            if(/android/i.test(navigator.userAgent)) {
                self.Mob = 'aOS';
            } else {
                self.Mob = 'iOS';
            }

            // Check if HTC403
            if(/4.0.3/i.test(navigator.userAgent)) { 
                self.isHTC403 = 'true';
            } else {
                self.isHTC403 = 'false';
            }
        }
    };

    self.mobileCheck();
})(window);