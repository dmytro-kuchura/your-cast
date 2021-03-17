import React from 'react';
import {validate} from '../../../helpers/validation';

const rules = {
    'author': ['string', 'required'],
    'podcast_owner': ['string', 'required'],
    'email_owner': ['email', 'required'],
    'copyright': ['string', 'required'],
};

class StepSixth extends React.Component {
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
                    <h4 className="mb-10 font-weight-bold text-dark">Owner Details</h4>
                    <div className="form-group">
                        <label>Author</label>
                        <input type="text"
                               className={validate('author', this.state.show.owner, rules['author']) ? 'form-control is-invalid' : 'form-control'}
                               name="author"
                               placeholder="Author"
                               onChange={this.props.handleChangeInput}
                               defaultValue={this.state.show.author ? this.state.show.author : ''}/>
                        <span className="form-text text-danger">
                            {validate('owner', this.state.show.author, rules['author'])}
                        </span>
                        <span className="form-text text-muted">
                            (When you add new podcast this Author name to be credited with the content.
                            And will be displayed in any listening apps.)
                        </span>
                    </div>

                    <div className="form-group">
                        <label>Owner</label>
                        <input type="text"
                               className={validate('owner', this.state.show.podcast_owner, rules['podcast_owner']) ? 'form-control is-invalid' : 'form-control'}
                               id="podcast_owner"
                               name="podcast_owner"
                               placeholder="Owner"
                               onChange={this.props.handleChangeInput}
                               value={this.state.show.podcast_owner ? this.state.show.podcast_owner : ''}/>
                        <span className="form-text text-danger">
                            {validate('owner', this.state.show.podcast_owner, rules['podcast_owner'])}
                        </span>
                    </div>

                    <div className="form-group">
                        <label>Owner email</label>
                        <input type="text"
                               className={validate('email_owner', this.state.show.email_owner, rules['email_owner']) ? 'form-control is-invalid' : 'form-control'}
                               id="email_owner"
                               name="email_owner"
                               placeholder="example@domain.com"
                               onChange={this.props.handleChangeInput}
                               value={this.state.show.email_owner ? this.state.show.email_owner : ''}/>
                        <span className="form-text text-danger">
                            {validate('owner', this.state.show.email_owner, rules['email_owner'])}
                        </span>
                    </div>

                    <div className="form-group">
                        <label>Copyright</label>
                        <div className="input-group">
                            <div className="input-group-prepend">
                                <span className="input-group-text">©</span>
                            </div>
                            <input type="text"
                                   className={validate('copyright', this.state.show.copyright, rules['copyright']) ? 'form-control is-invalid' : 'form-control'}
                                   name="copyright"
                                   placeholder="Copyright"
                                   onChange={this.props.handleChangeInput}
                                   defaultValue={this.state.show.copyright ? this.state.show.copyright : ''}/>
                        </div>
                        <span className="form-text text-danger">
                            {validate('owner', this.state.show.copyright, rules['copyright'])}
                        </span>
                    </div>
                </div>
            </>
        );
    }
}

export default StepSixth;
