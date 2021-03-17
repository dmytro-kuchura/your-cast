import React from 'react';
import timezones from '../../../helpers/timezones.json';
import languages from '../../../helpers/languages.json';

class StepFourth extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            show: {}
        };

        this.state.show = props.show;
    }

    componentDidUpdate(prevProps) {
        if (prevProps.show !== this.props.show) {
            this.setState({show: this.props.show})
        }
    }

    render() {
        return (
            <>
                <div className="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                    <h4 className="mb-10 font-weight-bold text-dark">Publishing time zone</h4>

                    <div className="form-group">
                        <label htmlFor="timezones">Timezones</label>
                        <select className="form-control"
                                id="timezone"
                                name="timezone"
                                value={this.state.show.timezone}
                                onChange={this.props.handleChangeInput}>
                            <Timezones timezones={timezones}/>
                        </select>
                    </div>

                    <div className="form-group">
                        <label htmlFor="language">Language</label>
                        <select className="form-control"
                                id="language"
                                name="language"
                                value={this.state.show.language}
                                onChange={this.props.handleChangeInput}>
                            <Languages languages={languages}/>
                        </select>
                    </div>

                    <div className="form-group">
                        <label>Explicit</label>
                        <div className="checkbox-list">
                            <label className="checkbox">
                                <input type="checkbox"
                                       name="explicit"
                                       id="explicit"
                                       checked={this.state.show.explicit}
                                       onChange={this.props.handleChangeInput}/>
                                <span></span>
                            </label>

                        </div>
                        <span className="form-text text-muted">
                            Check this box to let your listeners know if they should expect
                                    to hear explicit language on your show.
                        </span>
                    </div>
                </div>
            </>
        );
    }
}

const Timezones = (props) => {
    let list = props.timezones;
    let html;

    html = list.map((timezone) => {
        return (
            <option key={timezone.code} value={timezone.code}>{timezone.name}</option>
        )
    })

    return html;
};

const Languages = (props) => {
    let list = props.languages;
    let html;

    html = list.map((language) => {
        return (
            <option key={language.code} value={language.code}>{language.name}</option>
        )
    })

    return html;
};

export default StepFourth;
