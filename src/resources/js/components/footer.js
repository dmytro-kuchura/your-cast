import React from 'react';
import {Link} from 'react-router-dom';

function Footer() {
    return (
        <>
            <footer className="content-footer">
                <div>© 2021 <a href="http://laborasyon.com" target="_blank">Dmytro Kuchura</a></div>
                <div>
                    <nav className="nav">
                        <Link to="/account/changelog" className="nav-link">Change Log</Link>
                        <Link to="/account/help" className="nav-link">Get Help</Link>
                    </nav>
                </div>
            </footer>
        </>
    );
}

export default Footer;
