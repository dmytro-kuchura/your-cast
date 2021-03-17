import React from 'react';
import {connect} from 'react-redux';
import Navigation from './common/navigation';
import Buttons from './common/buttons';
import StepFirst from './create/step-first';
import StepSecond from './create/step-second';
import StepThird from './create/step-third';
import StepFourth from './create/step-fourth';
import StepFifth from './create/step-fifth';
import StepSixth from './create/step-sixth';
import {createShow} from '../../services/show-service';
import {uploadImage} from '../../services/upload-service';

class ShowCreate extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            step: 5,
            show: {
                id: null,
                title: '',
                description: '',
                artwork: null,
                format: 'episodic',
                timezone: 'Etc/GMT',
                language: 'en',
                explicit: false,
                category: null,
                tags: null,
                author: null,
                podcast_owner: null,
                email_owner: null,
                copyright: null,
            }
        };

        this.handleChangeInput = this.handleChangeInput.bind(this);
        this.handleSubmitForm = this.handleSubmitForm.bind(this);
        this.validForm = this.validForm.bind(this);
        this.validStep = this.validStep.bind(this);
        this.addArtwork = this.addArtwork.bind(this);
        this.handleNextStep = this.handleNextStep.bind(this);
        this.handlePreviousStep = this.handlePreviousStep.bind(this);
        this.handlePreviousStep = this.handlePreviousStep.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                show: this.props.show
            })
        }
    }

    handleChangeInput(event) {
        let input = event.target.name;
        let value = event.target.value;
        let state = Object.assign({}, this.state);

        if (input === 'explicit') {
            value = !this.state.show.explicit;
        }

        state.show[input] = value;

        this.setState(state);
    }

    handleSubmitForm(event) {
        event.preventDefault();

        if (!this.validForm()) {
            return;
        }

        this.props.dispatch(createShow(this.state.show))
            .catch(error => {
                console.log(error);
            })
    }

    addArtwork(event) {
        let state = Object.assign({}, this.state);
        let self = this;

        this.props.dispatch(uploadImage({
            file: event.target.files[0],
            param: 'show'
        }))
            .then(response => {
                state.show['artwork'] = response.path;
                self.setState(state);
            })
            .catch(error => {
                console.log(error);
            })
    }

    handleNextStep(event) {
        event.preventDefault();

        if (!this.validStep()) {
            return;
        }

        this.setState({
            step: this.state.step + 1
        })
    }

    handlePreviousStep(event) {
        event.preventDefault();

        this.setState({
            step: this.state.step - 1
        })
    }

    // TODO need code
    validForm() {
        // for (const [key, value] of Object.entries(data)) {
        //     if (rules.hasOwnProperty(key)) {
        //         let valid = validate(key, value, rules[key]);
        //
        //         return valid === undefined || valid === null;
        //     }
        // }

        return true;
    }

    // TODO need code
    validStep() {
        let step = this.state.step;

        // for (const [key, value] of Object.entries(data)) {
        //     if (rules.hasOwnProperty(key)) {
        //         let valid = validate(key, value, rules[key]);
        //
        //         return valid === undefined || valid === null;
        //     }
        // }

        return true;
    }

    render() {
        console.log(this.state.show);
        return (
            <>
                <div className="container">
                    <div className="card card-custom">
                        <div className="card-body p-0">
                            <div className="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                                <Navigation step={this.state.step}/>

                                <div className="row justify-content-center">
                                    <div className="alert alert-warning">
                                        Add information about your show.
                                        Don't worry! You can always edit your show settings later.
                                    </div>
                                </div>

                                <div className="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                    <div className="col-xl-12 col-xxl-7">
                                        <form className="form" id="kt_form">
                                            {this.state.step === 1 ?
                                                <StepFirst show={this.state.show}
                                                           handleChangeInput={this.handleChangeInput}/> : null}

                                            {this.state.step === 2 ?
                                                <StepSecond show={this.state.show}
                                                            addArtwork={this.addArtwork}/> : null}

                                            {this.state.step === 3 ?
                                                <StepThird show={this.state.show}
                                                           handleChangeInput={this.handleChangeInput}/> : null}

                                            {this.state.step === 4 ?
                                                <StepFourth show={this.state.show}
                                                            handleChangeInput={this.handleChangeInput}/> : null}

                                            {this.state.step === 5 ?
                                                <StepFifth show={this.state.show}
                                                           handleChangeInput={this.handleChangeInput}/> : null}

                                            {this.state.step === 6 ?
                                                <StepSixth show={this.state.show}
                                                           handleChangeInput={this.handleChangeInput}/> : null}

                                            <Buttons step={this.state.step}
                                                     handlePreviousStep={this.handlePreviousStep}
                                                     handleSubmitForm={this.handleSubmitForm}
                                                     handleNextStep={this.handleNextStep}
                                            />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
        show: state.Show,
    }
};

export default connect(mapStateToProps)(ShowCreate)
