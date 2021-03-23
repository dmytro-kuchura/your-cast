import React from 'react';

function Footer() {
    return (
        <>
            <div className="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <div
                    className="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div className="text-dark order-2 order-md-1">
                        <span className="text-muted font-weight-bold mr-2">{(new Date()).getFullYear()} ©</span>
                        <a href="http://keenthemes.com/metronic" target="_blank"
                           className="text-dark-75 text-hover-primary">Dmytro Kuchura</a>
                    </div>
                    <div className="nav nav-dark">
                        <a href="http://keenthemes.com/metronic" className="nav-link pl-0 pr-5">About</a>
                        <a href="http://keenthemes.com/metronic" className="nav-link pl-0 pr-0">Contact</a>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Footer;
