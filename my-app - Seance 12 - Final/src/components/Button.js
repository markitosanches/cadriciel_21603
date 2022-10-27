import PropTypes from 'prop-types'

const Button = ({color, text, onClick}) =>{

    return(
        <button style={{background: color }} className="btn" onClick={onClick}>
            { text }
        </button>
    )
}

Button.defaultProps = {
    color: 'steelBlue'
}

Button.propTypes = {
    text: PropTypes.string.isRequired,
    onClick: PropTypes.func.isRequired
}
export default Button