CREATE FUNCTION fn_concat_user_attributes_by_space(users.first_name VARCHAR, users.last_name VARCHAR) RETURNS VARCHAR AS $$
BEGIN
    RETURN (users.first_name || ' ' || users.last_name)
END;
$$ LANGUAGE plpgsql;

CREATE INDEX concat_name_gin ON users USING gin (fn_concat_user_attributes_by_space(users.first_name, users.last_name) gin_trgm_ops);