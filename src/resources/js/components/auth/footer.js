import React from 'react';

function AuthFooter() {
    return (
        <div className="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
            <div className="text-dark-50 font-size-lg font-weight-bolder mr-10">
                <span className="mr-1">2021 ©</span>
                <a href="https://github.com/dmitry-kuchura" target="_blank"
                   className="text-dark-75 text-hover-primary">Dmytro Kuchura</a>
            </div>
            <a href="#" className="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>
        </div>
    );
}

export default AuthFooter;
