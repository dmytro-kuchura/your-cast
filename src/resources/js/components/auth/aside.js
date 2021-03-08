import React from "react";

function Aside() {
    return (
        <div className="login-aside d-flex flex-column flex-row-auto p-15"
             style={{backgroundColor: '#F2C98A'}}>
            <div className="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <a href="/account/" className="text-center mb-10">
                    <img src="/media/img/logo-letter.png" className="max-h-70px" alt=""/>
                </a>
                <h2 className="font-weight-bolder text-center font-size-h4 font-size-h1-lg"
                    style={{color: '#986923'}}>Welcome home of your podcasts.</h2>
                <br/>
                <h4>Strong tools podcast management and analytics.</h4>
            </div>
            <div
                className="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                style={{backgroundImage: 'url(/media/svg/podcast.svg)', backgroundSize: 'auto 32vh'}}></div>
        </div>
    );
}

export default Aside;
