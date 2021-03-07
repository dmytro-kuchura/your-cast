import React from "react";

function Aside() {
    return (
        <div className="login-aside d-flex flex-column flex-row-auto"
             style={{backgroundColor: '#F2C98A'}}>
            <div className="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <a href="#" className="text-center mb-10">
                    <img src="/media/logo-letter.png" className="max-h-70px" alt=""/>
                </a>
                <h3 className="font-weight-bolder text-center font-size-h4 font-size-h1-lg"
                    style={{color: '#986923'}}>Welcome home of your podcasts.
                    <br/>Strong tools podcast management and analytics.</h3>
            </div>
            <div
                className="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                style={{backgroundImage: 'url(/media/login-visual.svg'}}></div>
        </div>
    );
}

export default Aside;
