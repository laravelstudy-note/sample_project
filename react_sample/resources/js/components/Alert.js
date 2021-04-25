import React from 'react';

function Alert(props) {

	const message = props.message;
	const className = props.type;
	
    return (
        <div className={ "alert alert-" + className } role="alert">
			{message}

			<button onClick={ () => props.onClose() } 
				type="button"
				className="close"
				aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
    );
}

export default Alert;